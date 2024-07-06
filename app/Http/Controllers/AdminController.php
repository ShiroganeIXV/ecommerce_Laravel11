<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrInterface;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all(); // get all the data from the Category model - Laravel Eloquent ORM
        return view('admin.category',compact('data'));
    }

    //? add category
    public function add_category(Request $request){ // post method will need a request object
        // TODO use Category Model
         // Use firstOrCreate to check if the category exists before creating a new one
        $category = Category::firstOrCreate(
            ['category_name' => $request->category], // Check if a record exists with this category name
            ['category_name' => $request->category]  // If not found, create a new record with this category name
        );

        // Check if the category was recently created
        if ($category->wasRecentlyCreated) {
            // use toastr library to show a success message
            toastr()->timeout(10000)->closeButton()->success('Category added successfully');
        } else {
            // use toastr library to show a message that the category already exists
            toastr()->timeout(10000)->closeButton()->error('Category already exists');
        }

        return redirect()->back(); // redirect back to the previous page
        
    }

    //? delete category
    public function delete_category($id){
        // TODO use Category Model
        $category = Category::find($id); // find the category by id. method provided by Laravel Eloquent ORM
        $category->delete(); // delete the category
        toastr()->timeout(10000)->closeButton()->warning('Category deleted successfully'); // show a success message
        return redirect()->back(); // redirect back to the previous page
    }

    //? edit category
    public function edit_category($id){
        // TODO use Category Model
        $data = Category::find($id); // find the category by id. method provided by Laravel Eloquent ORM
        return view('admin.edit_category', compact('data')); // return the view with the category data
    }

    //? update category
    public function update_category(Request $request, $id){
        // TODO use Category Model
        $category = Category::find($id); // find the category by id. method provided by Laravel Eloquent ORM
        $category->category_name = $request->category; // update the category name
        $category->save(); // save the updated category
        toastr()->timeout(10000)->closeButton()->success('Category updated successfully'); // show a success message
        return redirect('/view_category'); // redirect to the view_category route
    }

    //? add product
    public function add_product(){
        $categories = Category::all(); // get all the categories

        return view('admin.add_product',compact('categories')); // compact: pass the 'categories' to the view
    }

    //? upload product
    public function upload_product(Request $request){ // post method will need a request object
        $product = new Product(); // create a new Product object

        // Check if a product with the given name already exists
        $productExists = Product::where('title', $request->product_name)->exists();

        if ($productExists) {
            // If the product exists, redirect back with an error message
            toastr()->timeout(10000)->closeButton()->error('Product name already exists');
            return back()->with('error', 'Product name already exists.');
        }


    // Database field    =    // Form field
        $product->title = $request->product_name; 
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->qty;
        $product->category = $request->category;

    
        // check if the product image is uploaded
        $image = $request->file('image');
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension(); // generate a unique name for the image
            $image->move(public_path('products'), $imageName); // move the image to the public/products folder
            $product->image = $imageName; // save the image name to the product object
        }

        $product->save(); // save the product
        toastr()->timeout(10000)->closeButton()->success('Product added successfully'); // show a success message
        return redirect()->back(); // redirect back to the previous page
    }

    //? view product
    public function view_product(){
        $products = Product::all(); // get all the data from the Product model - Laravel Eloquent ORM
        return view('admin.view_products',compact('products'));
    }

}
