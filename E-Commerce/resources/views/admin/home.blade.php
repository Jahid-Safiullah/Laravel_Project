<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
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
      @include('admin.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>