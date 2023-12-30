<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function view_users(){
        $users = User::where('user_role' , 2)->get();

        $response = [
            'success' => true,
            'data' => $users,
        ];

        return response()->json($response, 200);
    }

    public function view_vendors(){
        $users = User::where('user_role' , 3)->get();

        $response = [
            'success' => true,
            'data' => $users,
        ];

        return response()->json($response, 200);
    }
}
