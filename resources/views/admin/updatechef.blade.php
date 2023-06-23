<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">

    @include("admin.admincss")

  </head>
  <style>
      input[type=text]{
          width: 300px;
          height: 80px;
          border-radius:15px;
          margin-bottom: 20px;
      }
      input[type=submit]{
          width: 400px;
          height: 50px;
          border-radius: 25px;
          margin-top: 20px;
      }
      input[type=file]{
          width: 300px;
          margin-top: 20px;

      }
      input.secend{

      }
      label.image{margin-top: 20px;

      }
     img.oldimg{
          width: 150px;
          height: 150px;
         border-radius: 50%;
         margin-left: 120px;



      }
  </style>
  <body>

    <div class="container-scroller">

      @include ("admin.navbar")

      <div style="position:relative; top:80px; right:-450px;">
        <form method="post" action="{{url('/updatefoodchef',$data->id)}}" enctype="multipart/form-data" >
            @csrf
            <div >
                <label>Chef Name</label>
                <input style="color:black;" type="text" name="name" value="{{$data->name}}">
            </div>
            <div>
                <label>Speciality</label>
                <input id="secend" style="color:black;margin-left: 13px;" type="text" name="specialty" value="{{$data->specialty}}">
            </div>
            <div>
                <label class="image">Old Image</label><br>
                <img align="center" class="oldimg" src="/chefimage/{{$data->image}}" alt="" value="{{$data->image}}">
            </div>
            <div>
                <label>Upload Image</label>
                <input  type="file" name="image" >
            </div>
            <div>
                <input type="submit" name="button" value="Update" class="btn btn-sm btn-info">
            </div>
        </form>

    </div>


    @include ("admin.adminscript")

  </body>
  <script >
      // const image = document.querySelector("img");
      // const inputFile = document.querySelector("input");
      //
      // function handleInputFileChange() {
      //     const file = inputFile.files[0];
      //     const imageUrl = URL.createObjectURL(file);
      //     image.src = imageUrl;
      // }
      //
      // inputFile.addEventListener("change", handleInputFileChange);


  </script>
</html>
