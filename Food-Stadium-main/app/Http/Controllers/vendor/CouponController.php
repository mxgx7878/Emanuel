<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CustomizeMenu;
use App\Models\ProductImage;
use App\Models\ProductRemark;
use App\Models\Variation;
use App\Models\Coupon;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PHPUnit\Framework\Constraint\Count;

class CouponController extends Controller
{
    public function coupon_list(Request $request){
        $coupons = Coupon::where('user_id' , Auth::user()->id)->get();

        return response()->json(['status'=>true,'data'=>$coupons]);
    }

    public function view_coupon(Request $request , $coupon){
        $coupons = Coupon::where('user_id' , Auth::user()->id)->find($coupon);
        // dd($coupons);
        return response()->json(['status'=>true,'data'=>$coupons]);
    }

    public function coupon_add_update(Request $request , Coupon $coupon){
        $msg  = $coupon->id ? "Update Successfully" : "Added Successfully";

        $fields = Validator::make($request->all(), [
            'code' => 'required|unique:coupons,code,'.$coupon->id,
            'discount' => 'required',
            'expiry_date' => 'required',
        ]);
        if ($fields->fails()) {
            return response()->json(["status" => false, "message" => $fields->messages()], 200);
        }
        // $check_coupon = Coupon::where('code' , $request->code)->first();
        // if ($check_coupon) {
        //     return response()->json(["status" => false, "message" => "Unavailable code"], 200);
        // }

        $expiry_date = Carbon::parse($request->expiry_date)->format('Y-m-d');
        // dd($expiry_date , $request->expiry_date);

        $coupon->user_id = Auth::user()->id;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->expiry_date = $expiry_date;
        if( $coupon->save() )
        {
            return response()->json(['status'=>true,'msg'=>$msg]);
        }
        else
        {
            $msg= 'failed';
            return response()->json(['status'=>false,'msg'=>$msg]);
        }
        // dd($request);


    }

    public function delete_coupon(Request $request , $coupon){
        $coupons = Coupon::where('user_id' , Auth::user()->id)->where('id' , $coupon)->delete();
        // dd($coupons);
        return response()->json(['status'=>true,'msg'=>"Deleted Succefully"]);
    }
}
