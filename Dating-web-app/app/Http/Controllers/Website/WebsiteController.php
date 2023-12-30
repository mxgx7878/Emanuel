<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
   public function index()
   {
     return view('website.index');
   }

   public function login_view()
   {
       return view('website.login');
   }

   public function register_view()
   {
    return view('website.register');
   }
}
