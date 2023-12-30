<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetailModel;
use App\Models\UserPhotosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login-pages.login');
    }

 public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_role' => 1])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login.view')->with('error', 'Credentials not matched.');
        }
    }
    public function login(Request $req)
    {

        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = isset($req->remember_me) ? true : false;
      
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'user_role' => 2],$remember)) {
            return redirect()->route('home');
        } else {
            // return redirect()->route('user.login.view')->with('error', 'Credentials not matched.');
            return redirect()->route('login.view')->with('error', 'Credentials not matched.');
        }
    }
    function generateUniqueId($name) {
        // Get the first three letters of the name
        $namePrefix = strtoupper(substr($name, 0, 3));
    
        // Calculate the remaining length for the unique ID (between 5 and 7 characters)
        $remainingLength = mt_rand(5, 7);
    
        // Generate a random string for the remaining characters
        $randomString = bin2hex(random_bytes($remainingLength));
    
        // Combine the name prefix and random string
        $uniqueId = $namePrefix . $randomString;
    
        // Ensure the total length is between 8 and 10 characters
        if (strlen($uniqueId) < 8) {
            $uniqueId .= bin2hex(random_bytes(8 - strlen($uniqueId)));
        } elseif (strlen($uniqueId) > 10) {
            $uniqueId = substr($uniqueId, 0, 10);
        }
    
        return $uniqueId;
    }
    
    // Example usage
    

    public function register(Request $req)
    {
        $check = User::where('email', $req->email)->first();

        if (!$check) {
            $req->validate([
                'name' => 'required',
                'email' => 'required',
                'age' => 'required',
                'password' => 'required',
                'agecheck' => 'required'
            ]);

            $user = new User();
            $userDetail = new UserDetailModel();
            
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->user_role = 2;
            $userDetail->age = $req->age;
            $userDetail->gender_id = ($req->gender_male != null) ? $req->gender_male : $req->gender_female;
            $userDetail->looking_for_id =  ($req->looking_for_male != null) ? $req->looking_for_male : $req->looking_for_female;
            $userDetail->unique_id = $this->generateUniqueId($req->name);
            
            $userDetail->status = 1;
            if ($user->save()) {
                for ($i=1; $i <= 5 ; $i++) { 
                   $image = new UserPhotosModel();
                   $image->user_id = $user->id;
                   $image->save();
                }
                $userDetail->user_id = $user->id;
                $userDetail->save();
                return redirect()->route('register.view')->with('success', 'Account Created Success');
            } else {
                return redirect()->route('register.view')->with('error', 'Something Went Wrong!');
            }
        } else {
            return redirect()->route('register.view')->with('error', 'Already have an Account');
        }
    }

    public function logout()
    {

        $user_role = Auth::user()->user_role ;
        Auth::logout();
        if($user_role == 1)
        {
            return redirect()->route('admin.login.view');
        }
        else if($user_role == 2)
        {
            return redirect()->route('home');
        }
       
    }
}
