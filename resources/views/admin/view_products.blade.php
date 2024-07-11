<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    

    <style>
        input[type='text']{
            width: 400px;
            height: 50px;
            margin: 20px;
            margin-left: 0px;
            border-radius: 10px;
            padding-left: 10px;
        }

        .input_design{
            width: 400px;
            height: 50px;
            margin: 20px;
            margin-left: 0px;
            border-radius: 10px;
            padding-left: 10px;
        }

        .div_design{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        .table_design{
          text-align: center ;
          margin: auto;
          border: 2px solid skyblue;
          margin-top: 50px;
          width: 80%;

        }

        label{
            display: inline-block;
            width: 250px;
            font-size: 18px !important;
            color: white !important;
        }

        th{
          background-color: skyblue;
          padding: 15px;
          font-size: 20px;
          font-weight: bold;
          color: white;
        }

        td{
          color: white;
          padding: 10px;
          border: 1px solid skyblue;
        }

        img{
          width: 100px;
          height: 130px;
        }

 



        
    </style>
  </head>
  <body>
  
    <!-- Header section  -->
    @include('admin.header')
    <!-- Header section end -->

    <!-- Sidebar Navigation -->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>All Products</h1>
                <div class="div_design">
                  <form action="{{ url('product_search') }}" method="GET">
                      <input class="input_design" type="search" name="search" placeholder="Enter name or category" value="{{ $search ?? ' ' }} ">
                      <input type="submit" class="btn btn-secondary" value="Search">
                      <br>
                      <label for="price_range">Price Range:</label>
                      <span>0</span>
                      <input type="range" id="price_range" name="price_range" min="0" max="1000" value="{{ $price_range ?? 1000 }}">
                      <span id="priceValue">0</span>
                  </form>
                </div>
                

                <div class="div_design">
                    <table class="table_design">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>

                        @foreach($products as $product)
                        <tr>
                            <td><h5>{{$product->title}}</h5></td>
                            <td>{!!Str::limit($product->description,50)!!}</td>
                            <td>{{$product->category}}</td>
                            <td>${{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td><img src="./products/{{$product->image}}" alt="{{$product->title}}"> </td>
                            <td>
                              <div style="display: flex; align-items: center; justify-content: center;">
                                <a class="btn btn-success mr-3" href="{{url('update_product', $product->id)}}">Edit</a>
                                <!-- <a class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a></td> -->
                                <form action="/delete_product/{{ $product->id }}" method="POST"> <!--// HTML forms do not support the DELETE method directly. The @method('DELETE') directive is correctly used to spoof the DELETE method for Laravel to process it accordingly. -->
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger " data-category-id="{{ $product->id }} type="submit" onclick="return confirm('Are you sure you want to PERMANENTLY delete this product?')">Delete</button>
                                </form>
                              </div>
                              
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
               
                </div>
                <!-- //TODO Pagination -->
                <div class="div_design">
                <!-- {{ $products->links() }} -->
                {{ $products->appends(['search' => isset($search) ? $search : ' ', 'price_range' => isset($price_range) ? $price_range : '1000'])->links() }}
                </div>
               

            
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>

  
    <script>
    // JavaScript to display the range value dynamically
    const rangeInput = document.getElementById('price_range');
    const valueDisplay = document.getElementById('priceValue');

    rangeInput.addEventListener('input', function() {
        valueDisplay.textContent = this.value;
    });

    // Initialize the display
    valueDisplay.textContent = rangeInput.value;
  </script>
  </body>
</html>