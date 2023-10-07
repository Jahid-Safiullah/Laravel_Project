<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <style type="text/css">
    .div_center{
        text-align:center;
        padding-top:40px;
    }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partial_sideber')
      <!-- partial -->
      <!-- add view/admin/navbar.blade.php -->
      @include('admin.navber')
        <!-- partial -->
        <!-- add view/admin/body.blade.php -->
      
        <div class="main-panel">
             <div class="content-wrapper">
                <div class="div_center">
                    <h2>Add Catagory</h2>
                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input type="text" class="border border-light rounded" name="catagory" placeholder="Write Catagory name">
                        <input type="submit" class="border border-light rounded" name="submit" value="Add Catagory">
                    </form>
                </div>
             </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>