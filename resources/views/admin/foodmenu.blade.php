<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <title>Food Menu</title>
        <style>
            input {
                color: green;
            }
            .content{
                
                width:"100vh";
            }
        </style>
        <head>
            @include("admin.admincss")
        </head>
        <body>
            <div class="container-scroller">
                @include ("admin.navbar")
                <div class="content" style="position:relative; top:60px; right:-150px">
                    <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data"
                          style="position:relative; top:-30px;>

                        @csrf

                        <div>
                            <label for="">Title</label>
                            <input type="text" name="title" placeholder="Write title" required style="margin-left: 5px;
                                    border-radius: 5px;margin-bottom: 10px;">
                        </div>
                        <div>
                            <label for="">Price</label>
                            <input type="number" name="price" placeholder="price" required style="border-radius: 5px;margin-bottom: 10px;">
                        </div>
                        <div>
                            <label for="">Image</label>
                            <input type="file" name="image" required style="margin-bottom: 10px;">
                        </div>
                        <div>
                            <label for="">Description</label>
                            <input type="text" name="description" placeholder="description" required style="margin-bottom: 10px;
                            height:100px;width:300px">
                        </div>
                        <div>
                            <input type="submit" value="save" style="padding:10px 40px; background-color:white; color:black;margin-top: 15px"
                                   class="btn btn-outline-info">
                        </div>
                    </form>
                    <div class="mt-2">
                        <table class="bg bg-info">
                            <tr>
                                <th style="padding:40px;border:2px solid white;">Food Name</th>
                                <th style="padding:40px;border:2px solid white;">Price</th>
                                <th style="padding:40px;border:2px solid white;">Description</th>
                                <th style="padding:30px;border:2px solid white;">Image</th>
                                <th style="padding:40px;border:2px solid white;">Action</th>
                            </tr>
                            @foreach ($data as $data)
                            <tr align="center" style="margin:5px">
                                <td style="padding:40px;border:2px solid white;">{{$data->title}}</td>
                                <td style="padding:40px;border:2px solid white;">{{$data->price}}</td>
                                <td style="padding:40px;border:2px solid white;">{{$data->description}}</td>
                                <td style="padding:40px;border:2px solid white;"><img height="100" width="100" src="/foodimage/{{$data->image}}" alt=""></td>
                                <td style="padding:40px;border:2px solid white;">
                                    <a href="{{url('/deletemenu',$data->id)}}" onclick="return confirm('Are you sure to delete this data')" class="btn btn-sm btn-danger ">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            @include ("admin.adminscript")
        </body>
    </html>
</x-app-layout>
