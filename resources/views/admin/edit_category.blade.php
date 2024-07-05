<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        input[type='text']{
            width: 400px;
            height: 50px;
            margin: 20px;
            border-radius: 10px;
            padding-left: 10px;
        }

        .div_design{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table_deg{
          text-align: center ;
          margin: auto;
          border: 2px solid skyblue;
          margin-top: 50px;
          width: 30%;

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
            
            <div class="div_design">
                <h1>Update Category</h1>
                <form action="{{url('update_category',$data->id)}}" method="post"> <!-- data is fetched from the controller -->
                    @csrf <!-- Cross Site Request Forgery -->
                    <input type="text" name="category" value="{{$data->category_name}}">
                    <input class="btn btn-primary" type="submit" value="Update Category">
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