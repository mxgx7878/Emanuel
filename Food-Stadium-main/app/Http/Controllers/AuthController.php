<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function test()
    {
        dd(Auth::user());
    }
    public function register(Request $request)
    {

        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'user_role' => 2
            ]
        );
        if ($validate->fails()) {
            $response =
                [
                    'success' => false,
                    'message' => $validate->errors()
                ];
            return response()->json($response, 400);
        }

        if (User::where('email', $request->email)->exists()) {
            $response = [
                'success' => false,
                'message' => 'This email is already taken',
            ];
            return response()->json($response, 400);
        }

        // Create a new user
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        // $success['name'] = $user->name;
        $success['email'] = $user->email;
        $success['role'] = $user->user_role;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'User Registered Successfully',
        ];

        return response()->json($response, 200);
    }



    public function vendor_register(Request $request){
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'user_role' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'logo' => 'required',
                'store_name' => 'required',
                'store_description' => 'required',
                'store_timing' => 'required',
                // 'vendor_zipcodes' => 'required',
            ]
        );
        if ($validate->fails()) {
            $response =
                [
                    'success' => false,
                    'message' => $validate->errors()
                ];
            return response()->json($response, 400);
        }

        if (User::where('email', $request->email)->exists()) {
            $response = [
                'success' => false,
                'message' => 'This email is already taken',
            ];
            return response()->json($response, 400);
        }

        $vendor_create = new User();

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/userlogo'), $imageName);
            $imagepath = "images/userlogo/" . $imageName;

            $vendor_create->logo = $imagepath;
        }

        $vendor_create->name = $request->name;
        $vendor_create->email = $request->email;
        $vendor_create->password = bcrypt($request->password);
        $vendor_create->user_role = 3;
        $vendor_create->city = isset($request->city) ? $request->city : null ;
        $vendor_create->state = isset($request->state) ? $request->state : null;
        $vendor_create->country = isset($request->country) ? $request->country : null;
        $vendor_create->store_name = isset($request->store_name) ? $request->store_name : null;
        $vendor_create->store_description = isset($request->store_description) ? $request->store_description : null;
        $vendor_create->store_timing = isset($request->store_timing) ? $request->store_timing : null;

        $vendor_create->save();


        $success['token'] = $vendor_create->createToken('MyApp')->plainTextToken;
        // $success['name'] = $user->name;
        $success['email'] = $vendor_create->email;
        $success['role'] = $vendor_create->user_role;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'User Registered Successfully wait for admin approval',
        ];

        return response()->json($response, 200);

    }



    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            $response = [
                'success' => false,
                'message' => 'Unauthorized User'
            ];

            return response()->json($response, 401);
        }

        // Authentication successful
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['email'] = $user->email;
        // $success['name'] = $user->name;
        $success['role'] = $user->user_role;

        // $this->tokencheck($success['token']);

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'User login Successfully'
        ];

        return response()->json($response, 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json("user has been logout successfully");
    }





    public function add_product(Request $request){
        return view('addproduct');
    }


    public function view_product(Request $request){
        return view('view_product');
    }

}
