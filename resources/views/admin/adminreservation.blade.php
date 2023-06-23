<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <title>Food Menu</title>
        <style>
            input {
                color: green;
            }
        </style>
        <head>
            @include("admin.admincss")
        </head>
        <body>
            <div class="container-scroller">
                @include ("admin.navbar")
              <div style="position:relative; top:70px; right:-60px">
                <table bgcolor="gray"  style="border 2px solid red";>
                  <tr align="center">
                    <th style="padding:10px 30px; border:2px solid white; background-color:green;">Name</th>
                    <th style="padding:20px 50px; border:2px solid white; background-color:green;">Email</th>
                    <th style="padding:20px 30px; border:2px solid white; background-color:green;">Phone</th>
                    <th style="padding:10px 15px; border:2px solid white; background-color:green;">Guest</th>
                    <th style="padding:20px 30px; border:2px solid white; background-color:green;">Date</th>
                    <th style="padding:10px 20px; border:2px solid white; background-color:green;">Time</th>
                    <th style="padding:20px 50px; border:2px solid white; background-color:green;">Message</th>
                  </tr>
                  
                  @foreach ($data as $data)
                  <tr align="center">
                    <th style="padding:10px 30px; border:2px solid white">{{$data->name}}</th>
                    <th style="padding:10px 40px; border:2px solid white">{{$data->email}}</th>
                    <th style="padding:10px 30px; border:2px solid white">{{$data->phone}}</th>
                    <th style="padding:10px 15px; border:2px solid white">{{$data->guest}}</th>
                    <th style="padding:10px 30px; border:2px solid white">{{$data->date}}</th>
                    <th style="padding:10px 20px; border:2px solid white">{{$data->time}}</th>
                    <th style="padding:10px 50px; border:2px solid white">{{$data->message}}</th>
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