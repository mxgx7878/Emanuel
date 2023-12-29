<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ZipCodeController extends Controller
{
    public function zip_code_add(Request $req ){

        $user = User::where('id' , Auth::user()->id)->first();


        if ( $user->vendor_zipcodes) {
            $decode_json =  json_decode($user->vendor_zipcodes );

            if (in_array($req->zip_code,$decode_json)) {
                return response()->json(['status'=>false,'msg'=>"Zip Code Already Exist"]);
            }
            else{
                array_push($decode_json, $req->zip_code );

                $json_code =  json_encode($decode_json );
                // dd($json_code);
                $user->vendor_zipcodes = $json_code;
                $user->save();

                return response()->json(['status'=>true,'msg'=>"Added Successfully"]);
            }
        }
        else{
            $zip_code[] = $req->zip_code;
            // dd($zip_code);
            $json_code =  json_encode($zip_code );
            // dd($json_code);
            $user->vendor_zipcodes = $json_code;
            $user->save();

            return response()->json(['status'=>true,'msg'=>"Added Successfully"]);
        }



    }

    public function zip_code_update(Request $req , $zipcode){
        $user = User::where('id' , Auth::user()->id)->first();
        $decode_json =  json_decode($user->vendor_zipcodes);

        $key = array_search($zipcode, $decode_json);
        if (false !== $key) {
            // unset($decode_json[$key]);
            if (in_array($req->zip_code,$decode_json) && $zipcode != $req->zip_code) {
                return response()->json(['status'=>false,'msg'=>"Zip Code Already Exist"]);
            }
            else{

                $decode_json[array_search($zipcode, $decode_json)] = $req->zip_code;

                $json_code =  json_encode($decode_json );
                // dd($json_code);

                $user->vendor_zipcodes = $json_code;
                $user->save();

                return response()->json(['status'=>true,'msg'=>"Updated Successfully"]);
            }
        }
        else{
            return response()->json(['status'=>false,'msg'=>"Zip Code Not Found"]);
        }

    }

    public function zip_code_delete(Request $req , $zipcode){

        $user = User::where('id' , Auth::user()->id)->first();
        $decode_json =  json_decode($user->vendor_zipcodes);

        $key = array_search($zipcode,$decode_json);
        // dd($decode_json);
        if (false !== $key) {
            unset($decode_json[$key]);

            // dd($decode_json);

            $json_code =  json_encode($decode_json);

            $user->vendor_zipcodes = $json_code;
            $user->save();

            return response()->json(['status'=>true,'msg'=>"Deleted Successfully"]);
        }
        else{
            return response()->json(['status'=>false,'msg'=>"Zip Code Not Found"]);
        }

    }

    public function zip_code_list(){

        $user = User::where('id' , Auth::user()->id)->first();

        $decode_json =  json_decode($user->vendor_zipcodes);

        return response()->json(['status'=>true,'data'=>$decode_json]);


    }
}
