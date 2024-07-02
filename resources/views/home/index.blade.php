<!DOCTYPE html>
<html>

<head>
  @include('home/css')
</head>

<body>
  <div class="hero_area">
    <!-- //TODO header section strats -->
    @include('home/header')
    <!-- end header section -->
    
    <!--//TODO slider section -->
    @include('home/slider')
    <!-- end slider section -->
  
    </div>
  <!-- end hero area -->

  <!--//TODO shop section -->
    @include('home/product')
  <!-- end shop section -->



  <!-- //TODO contact section -->
    @include('home/contact')
  <!-- end contact section -->

   

  <!-- //TODO info section -->
   @include('home/footer')

  

</body>

</html>