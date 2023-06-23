<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller" style="height:100vh" >

      @include ("admin.navbar")
<div class="container">
      <h1 align="center">Customer Orders</h1>


      <form action="{{url('/search')}}" method="get">
        @csrf
        <input type="text" name="search" style="color:black" >
        <input type="submit" value="Search" class="btn btn-success">
      </form>



      <table>
        <tr align="center">
          <td style="padding:0px 30px;">Name</td>
          <td style="padding:0px 30px;">Phone</td>
          <td style="padding:0px 30px;">Address</td>
          <td style="padding:0px 30px;">FoodName</td>
          <td style="padding:0px 30px;">Price</td>
          <td style="padding:0px 30px;">Quantity</td>
          <td style="padding:0px 30px;">Total Price</td>
        </tr>
        @foreach ($data as $data)
        <tr align="center" style="background:black;">
          <td>{{$data->name}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->address}}</td>
          <td>{{$data->foodname}}</td>
          <td>{{$data->price}}$</td>
          <td>{{$data->quantity}}</td>
          <td>{{$data->price * $data->quantity}}$</td>
        </tr>
        @endforeach
      </table>
  </div>
    </div>

    @include ("admin.adminscript")

  </body>
</html>
