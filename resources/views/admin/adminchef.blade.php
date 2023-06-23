<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller" style="height:100vh;">

      @include ("admin.navbar")
      <div style="position:relative; top:60px; right:-50px">
        <form action="{{url ('/uploadchef') }}" method="post" enctype="multipart/form-data" style="position:relative; top:-20px; right:-300px">

          @csrf

              <div>
                  <label>Name</label>
                  <input style="color:black;margin-left:27px;margin-bottom:10px; border-radius:5px;width:300px;" type="text" name="name" placeholder="Enter Name" required>
              </div>
              <div>
                  <label>Speciality</label>
                  <input style="color:black;margin-bottom:10px;border-radius:5px;width:300px;height:100px;" type="text" name="specialty"placeholder="Enter Speciality" required>
              </div>
              <div>
                  <input  type="file" name="image"  required>
              </div>

              <div>
                  <input style="padding:10px 40px; background-color:white; color:black;margin-top: 15px"  type="submit" value="Save" class="btn btn-outline-info" >
              </div>
        </form>
        <div style="margin-top: 80px">
        <table bgcolor="black">
            <tr style="border:1px solid white" align="center">
              <th style="padding:20px 30px;border:1px solid white;">Name</th>
              <th style="padding:20px 30px;border:1px solid white;">Speciality</th>
              <th style="padding:20px 30px;border:1px solid white;">Image</th>
              <th style="padding:20px 30px;border:1px solid white;">Action</th>
            </tr>
            @foreach ($data as $data)
            <tr style="border:1px solid white"; align="center">
              <th style="padding:20px 20px;border:1px solid white;">{{$data->name}}</th>
              <th style="padding:20px 20px;border:1px solid white;">{{$data->specialty}}</th>
              <th style="height:50px;width:50px;border:1px solid white;"><img src="/chefimage/{{$data->image}}"></th>
              <th style="border:1px solid white;">
                  <a href="{{url ('/updatechef',$data->id) }}" class="btn btn-sm btn-info ">Update</a>
                  <a href="{{url ('/deletchef',$data->id) }}" onclick="return confirm('Are you sure to delete this data')" class="btn btn-sm btn-danger">Delete</a>
              </th>
            </tr>
            @endforeach
        </table>
      </div>
      </div>

    </div>

    @include ("admin.adminscript")

  </body>
</html>
