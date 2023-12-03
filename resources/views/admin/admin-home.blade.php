<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end--> 
      @include('admin.body')

    @include('admin.footer')
      </div>
    </div>
    <!-- JavaScript files-->

    @include('admin.script')
  </body>
</html>