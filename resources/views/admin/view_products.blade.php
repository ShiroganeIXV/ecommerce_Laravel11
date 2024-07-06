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

        .table_design{
          text-align: center ;
          margin: auto;
          border: 2px solid skyblue;
          margin-top: 50px;
          width: 60%;

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
          height: 100px;
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

                <div class="div_design">
                    <table class="table_design">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                        </tr>

                        @foreach($products as $product)
                        <tr>
                            <td><h5>{{$product->title}}</h5></td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td><img src="./products/{{$product->image}}" alt="{{$product->title}}"> </td>

                        </tr>
                        @endforeach
                    </table>
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
  </body>
</html>