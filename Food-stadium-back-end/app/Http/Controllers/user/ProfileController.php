<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function user_detail(){
        // dd(Auth::user());
        $data = Auth::user();
        if ($data) {
            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'message' => 'no data found']);
        }
    }

    public function update_profile(Request $request){
        // dd(Auth::user() ,$request);


        $fields = Validator::make($request->all(),[
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
        ]);
        if($fields->fails()){
            return response()->json(["status" => false, "message" => $fields->messages()]);
        }

        $update_profile = User::find(Auth::user()->id);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/userlogo'), $imageName);
            $imagepath = "images/userlogo/" . $imageName;

            $update_profile->logo = $imagepath;
        }

        $update_profile->name = $request->name;
        $update_profile->address = $request->address;
        $update_profile->city = $request->city;
        $update_profile->state = $request->state;
        $update_profile->zipcode = $request->zipcode;
        if ($update_profile->save()) {
            return response()->json(['status' => true, 'message' => 'Record updated']);
        }
        else{
            return response()->json(['status' => false, 'message' => 'Failed']);
        }

    }


    public function change_password(Request $request){
        
        if (Hash::check($request->old_password ,  Auth::user()->password)) {
            if ($request->new_password == $request->confirm_password) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->new_password);
                $user->save();
                return response()->json(['status' => true, 'message' => 'Password change']);
            }
            else{
                return response()->json(['status' => false, 'message' => 'Confirm password not match']);
            }
        }
        else{
            return response()->json(['status' => false, 'message' => 'You enter a wrong password']);
        }


    }
}
