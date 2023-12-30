<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactQueryController extends Controller
{
    public function contact_query(Request $request)
    {
        // dd($request);
        $fields = Validator::make($request->all(), [
            // 'full_name' => 'required',
            // 'email' => 'required|email',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'company' => 'required',
            // 'address' => 'required',
            // 'appartment' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'zipcode' => 'required',
            // 'phone' => 'required',

        ]);

        if ($fields->fails()) {
            return response()->json(["status" => false, "message" => $fields->messages()]);
        }

        $input = $request->all();
        ContactQuery::create($input);
        return response()->json(['status' => true, "message" => "Query Submitted"]);
        // if ($add_query->save()) {
        // }
        // else{
        //     return response()->json(['status' => false , "message" => "Failed"]);
        // }
    }
    
    public function get_contact_query(Request $request){
        $contact_queries = ContactQuery::all();
        return response()->json(['status'=>true,'data'=>$contact_queries]);
    }
}
