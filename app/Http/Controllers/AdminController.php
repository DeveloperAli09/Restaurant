<?php

namespace App\Http\Controllers;


use App\Models\Foodchef;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

/**
 * Summary of AdminController
 */
class AdminController extends Controller
{
        /**
         * Summary of user
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */

        // user details view function
        public function user()
        {
            $data = User::all();
            return view('admin.users', compact('data'));
        }

        // user delete or block function
        public function deleteuser($id)
        {
            $data = User::find($id);
            $data->delete();
            return redirect()->back()->with('success','User has been deleted');
        }



        public function admin()
        {
            return view("adminhome");
        }


        // 
        public function deletemenu($id){

            $data=food::find($id);
            $data->delete();
            return redirect()->back()->with('Success','Menu has been deleted');
        }


        public function foodMenu()
        {
            $data=food::all();
            return view('admin.foodmenu',compact('data'));
        }


        public function upload(Request $request)
        {
            $data = new food;

            $image = $request->image;

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('foodimage',$imagename);

            $data->image=$imagename;
            $data->title=$request->title;
            $data->price=$request->price;
            $data->description=$request->description;
            $data->save();

            return redirect()->back()->with('info','Upload Successful');
        }

        // reservation function
        public function reservation(Request $request)
        {
            $data = new reservation;

            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->guest=$request->guest;
            $data->date=$request->date;
            $data->time=$request->time;
            $data->message=$request->message;
            $data->save();

            return redirect()->back()->with('success','Your reservation Successful');
        }

        // reservation details view
    public function viewreservation()
        {
            if (Auth::id()) {
                $data = reservation::all();

                return view("admin.adminreservation", compact('data'));

            }
            else{
            return redirect('login');
            }
        }

        // add view chef details function
        public function viewchef(){

            $data=foodchef::all();

            return view("admin.adminchef",compact("data"));
        }

        // add chef details
        public function uploadchef(Request $request){

            $data = new foodchef;

            $image = $request->image;

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('chefimage',$imagename);

            $data->image=$imagename;
            $data->name=$request->name;
            $data->specialty=$request->specialty;
            $data->save();
            return redirect()->back()->with('success','Data has been saved');
        }

        // update chef details
        public function updatechef($id){

            $data =foodchef::find($id);

            return view("admin.updatechef",compact('data'));
        }
        // update chef details input
        public function updatefoodchef(Request $request,$id){

            $data=foodchef::find ($id);

            $image=$request->image;
            if ($image !=''){

                $imagename =time().'.'.$image->getClientOriginalExtension();

                $request->image->move('chefimage',$imagename);

                $data->image = $imagename;

            }

            $data->name =$request->name;
            $data->specialty =$request->specialty;
            $data->save();
            return redirect('/viewchef')->with('info','Data has been updated');

        }
        // delete chef details
        public function deletchef($id){
            $data=foodchef::find($id);
            $data->delete();
            return redirect()->back()->with('info','Data Deleted');
        }
        // order details view
        public function orders(){

            $data = order::all();

            return view("admin.orders",compact('data'));
        }
        // search order details
        public function search(Request $request){

            $search = $request->search;

            $data = order::where('name','Like','%'.$search.'%')->get();

            return view("admin.orders",compact('data'));
        }

}
