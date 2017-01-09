
<!DOCTYPE html>
<html lang="en">
  <head>
@include('layoutparts._head')
    
  </head>
  <body>

@include('layoutparts._nav')
   <div class="container">
@include('layoutparts._masseges')
     @yield('content')
@include('layoutparts._footer')
   </div> 



   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@include('layoutparts._script')
  </body>

</html>
