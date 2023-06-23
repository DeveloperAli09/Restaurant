<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{

    // Home page function user login and add to cart
    public function index()
    {   
        if(Auth::id()){
            return redirect('redirects');
        }
        $data = food::all();
        $data2 = foodchef::all();

        return view("home", compact("data", "data2"));
    }


    // user function if user not login redirect to login page
    public function redirects()
    {
        $data = food::all();
        $data2 = foodchef::all();
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view("admin.adminhome")->with('info', 'Welcome back');
        } else {

            $user_id = Auth::id();

            $count = cart::where('user_id', $user_id)->count();

            return view('home', compact('data', 'data2', 'count'))->with('Success', 'Login success');
        }
    }

    // add food  to card function
    public function addcart(Request $request, $id)
    {

        if (Auth::id()) {

            $user_id = Auth::id();

            $foodid = $id;

            $quantity = $request->quantity;
            $cart = new cart;
            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back();

        } else {

            return redirect('/login');
        }
    }


    // show card food count and food
    public function showcart(Request $request, $id)
    {

        $count = cart::Where('user_id', $id)->count();
        if(Auth::id()==$id){

        
        $data2 = cart::select('*')->Where('user_id', '=', $id)->get();
        $data = cart::Where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        return view('showcart', compact('count', 'data', 'data2'));
       }
       else{
        return redirect()->back();
       }
    }

    // remove food from cart
    public function remove($id)
    {

        $data = cart::find($id);
        $data->delete();
        return redirect()->back();

    }

    // table reservation function
    public function orderConfirm(Request $request)
    {

        foreach ($request->foodname as $key => $foodname) {
            $data = new order;
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();

        }
        return redirect()->back()->with('info','Order Confirmed');

    }
}