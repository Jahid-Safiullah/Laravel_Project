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
    .center{
      margin:auto;
      width:50%;
      text-align:center;
      margin-top:30px;
      border:3px solid white;
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

                  @if(session()->has('message'))
                  <div class="alert alert-success  alert-dismissible">
                    <button type="button" class="close" data-dismis="alert" aria-label="close">X</button>
                    {{session()->get('message')}}
                  </div>
                  @endif
                <div class="div_center">
                    <h2>Add Catagory</h2>
                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input type="text" class="border border-light rounded" name="catagory" placeholder="Write Catagory name">
                        <input type="submit" class="border border-light rounded" name="submit" value="Add Catagory">
                    </form>
                </div>

              <div>
              <table class="center">
                  <tr>
                    <th>Catagory Name</th>
                    <th>Action</th>
                  </tr>
                @foreach($data as $data)
                  <tr>
                    <td>{{$data->catagory_name}}</td>
                    <td> <a onclick="return confirm('Are you sure to Delete this?')" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">Delete</a> </td>
                  </tr>
                  @endforeach
                </table>
              </div>
             </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>