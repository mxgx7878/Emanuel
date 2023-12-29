<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CustomizeMenu;
use App\Models\ProductImage;
use App\Models\ProductRemark;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;



class ProductRemarkController extends Controller
{
    public function product_remark_add(Request $request){
        $fields = Validator::make($request->all(),[
            'product_id' => 'required',
            'rating' => 'required',
            'description' => 'required'
        ]);
        if($fields->fails()){
            return response()->json(["status" => false, "message" => $fields->messages()]);
        }
        // dd($request);
        $check_reamrks = ProductRemark::where(['user_id' => Auth::user()->id , 'product_id' => $request->product_id])->first();
        // dd($check_reamrks);
        if ($check_reamrks) {
            return response()->json(["status" => false, "message" => "Riview already submitted"]);
        }

        $product_remark = new ProductRemark();
        $product_remark->user_id = Auth::user()->id;
        $product_remark->product_id = $request->product_id;
        $product_remark->rating = $request->rating;
        $product_remark->description = $request->description;

        if ($product_remark->save()) {
            return response()->json(["status" => true, "message" => "Added Successfully"]);
        }
        else{
            return response()->json(["status" => false, "message" => "Failed"]);
        }
    }



    public function remark_by_product(Request $request , $product_id){
        $product_remark = ProductRemark::where('product_id' , $product_id)->get()->toArray();
        // dd($product_remark);
        if ($product_remark) {
            return response()->json(["status" => true, "data" => $product_remark], 200);
        }
        else{
            return response()->json(["status" => false, "message" => "No data Found"]);
        }
    }


}
