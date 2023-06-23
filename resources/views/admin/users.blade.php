<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <title>Users</title>
        <head>
            @include("admin.admincss")
        </head>
        <body>
            <div class="container-scroller">
                @include ("admin.navbar")
                <div style="position:relative; top:60px; right:-150px;">
                    <table bgcolor="gray" border="3px">
                        <tr>
                            <th style="padding:0px 50px">Name</th>
                            <th style="padding:0px 100px">Email</th>
                            <th style="padding:20px">Action</th>
                        </tr>
                        @foreach ($data as $data)
                            <tr align="center">
                                <th style="padding:7px">{{$data->name}}</th>
                                <th style="padding:7px">{{$data->email}}</th>
                                @if($data->usertype=="0")
                                    <th   style="padding:7px; margin:2px;">
                                    <a bgcolor="red" href="{{url('/deleteuser',$data->id)}}" 
                                    class="btn btn-sm btn-danger "
                                     onclick="return confirm('Are you sure to delete this data?')">Delete</a>
                                    </th>
                                @else
                                    <th bgcolor="green" style="padding:7px"><a>Not Allowed</a></th>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </body>
        <script>
            @include ("admin.adminscript")
        </script>
    </html>
</x-app-layout>