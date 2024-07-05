<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrInterface;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all(); // get all the data from the Category model - Laravel Eloquent ORM
        return view('admin.category',compact('data'));
    }

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
}
