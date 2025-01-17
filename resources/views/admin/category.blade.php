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
          <h1>Add category</h1>
            <div class="div_design">
                
                <form action="{{url('add_category')}}" method="post">
                  @csrf
                    <div >
                        <input type="text" name="category">
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </div>
                </form>
            </div>

            <div>
              <table class="table_deg">
                <tr>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>

                @foreach($data as $datum)
                <tr>
                  <td>{{ucwords($datum->category_name)}}</td>
                  <td>
                    <a class="btn btn-success" href="{{url('edit_category',$datum->id)}}">Edit</a>
                  </td>
                  <td>
                    <!-- <a class="btn btn-danger" href="{{url('delete_category',$datum->id)}}">Delete</a> -->
                    <form action="/delete_category/{{ $datum->id }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger delete-category" data-category-id="{{ $datum->id }} type="submit" onclick="return confirm('Are you sure you want to PERMANENTLY delete this category?')">Delete</button>
                    </form>
                  </td> <!-- get the id of the category and pass it to the url -->
                </tr>
                @endforeach

              </table>
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

      <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
  </body>
</html>