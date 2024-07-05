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
            margin-top: 60px;
        }

        .table_deg{
          text-align: center ;
          margin: auto;
          border: 2px solid skyblue;
          margin-top: 50px;
          width: 30%;

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

            <h1 class="h1 no-margin-bottom">Add Product</h1>
            
            <div class="div_design">

                <!-- //! Form to add product -->
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div>
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" required>
                    </div>

                    <div>
                        <label for="">Description</label>
                        <textarea class="input_design" name="description" id="" required></textarea>
                    </div>

                    <div>
                        <label for="">Price</label>
                        <input type="text" name="price" >
                    </div>

                    <div>
                        <label for="">Quantity</label>
                        <input class="input_design" type="number" name="qty" >
                    </div>
                        <!--//TODO: get category list from category table -->
                    <div>
                        <label for="">Category</label>
                        <select  class="input_design" name="category" id="" required>
                            <option value="">Select a Category</option>
                            
                            @foreach($categories as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            <!-- value: the value that will be stored in the database -->
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="">Image</label>
                        <input class="input_design" style="padding-left:0" type="file" name="image" >
                    </div>

                    <div>
                        <input class="btn btn-primary" ; type="submit" value="Add"  >
                    </div>

                </form>
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
  </body>
</html>