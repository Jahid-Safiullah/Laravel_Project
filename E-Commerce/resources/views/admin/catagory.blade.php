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
        padding:40px;
        background-color:#454d55;
    }
    .center{
      margin:auto;
      width:99.5%;
      text-align:center;
      margin-top:30px;
      border:1px solid white;
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

                    <form style="padding: 3px; " action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input type="text" class="border border-light rounded" name="catagory" placeholder="Write Catagory name">
                        <button type="submit" class="border border-light rounded btn btn-primary" name="submit" value="Add Catagory">Add Catagory</button>
                    </form>
                </div>


              <div>
              <table class="center table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col"  style="color: white">SL.</th>
                    <th scope="col"  style="color: white"> Catagory Name</th>
                    <th scope="col" style="color: white"> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $data)

                  <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->catagory_name}}</td>
                    <td> <a onclick="return confirm('Are you sure to Delete this?')" class="btn btn-danger" 
                    href="{{url('delete_catagory',$data->id)}}">Delete</a> </td>
                    <!-- <td><a href='delete/{{$data->id}}'>delete</a></td> -->
                  </tr>

                  @endforeach
                </tbody>
              </table>
              </div>

             </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
