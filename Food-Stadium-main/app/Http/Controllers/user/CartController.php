<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CustomizeMenu;
use App\Models\ProductImage;
use App\Models\ProductRemark;
use App\Models\Variation;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CartController extends Controller
{
    public function add_to_cart(Request $request, $product_id)
    {

        $fields = Validator::make($request->all(), [
            'quantity' => 'required',
        ]);
        if ($fields->fails()) {
            return response()->json(["status" => false, "message" => $fields->messages()]);
        }

        $variation = null;
        if ($request->variation) {
            $variation = $request->variation;
        }
        $check_zipcode = Product::with(['store'])->where('id' , $product_id)->first()->toArray();
        $zipcode_array = json_decode($check_zipcode['store']['vendor_zipcodes']);
        // dd($zipcode_array);

        if (in_array(Auth::user()->zipcode,$zipcode_array)) {
            $check_store = Cart::with(['product'])->where(['user_id' => Auth::user()->id])->first();
            $check_request_store = Product::find($product_id);
            if ($check_store && $check_request_store && $check_store['product']['store_id'] != $check_request_store['store_id']) {
                return response()->json(["status" => false, "message" => "Please add product from the same store"]);
            }
            else{
                $check_cart = Cart::where(['user_id' => Auth::user()->id, 'product_id' => $product_id, 'variation' => $variation])->first();
                // dd($check_cart);
                if ($check_cart) {
                    $check_cart->quantity = $check_cart->quantity +  $request->quantity;
                    $check_cart->instruction = isset($request->instruction) ? $request->instruction : $check_cart->instruction;
                    $check_cart->save();
                } else {
                    $add_cart = new Cart();
                    $add_cart->product_id = $product_id;
                    $add_cart->user_id = Auth::user()->id;
                    $add_cart->quantity = $request->quantity;
                    $add_cart->instruction = $request->instruction;
                    $add_cart->variation = $variation;
                    $add_cart->save();
                }
                return response()->json(["status" => true, "message" => "Added Successfully"]);
            }
        }
        else{
            return response()->json(["status" => false, "message" => "Store is not exist in your address"]);
        }


    }

    public function view_cart(Request $request)
    {
        // dd(Auth::user());
        $cart_product['cart'] = Cart::with(['product'])->where(['user_id' => Auth::user()->id])->get()
            ->map(function ($cart) {
                // dd($cart);
                if (is_string($cart->product->customize_item_id)) {
                    $cart->product->customize_item_id = json_decode($cart->product->customize_item_id);
                }
                if ($cart->variation) {
                    $cart->variation = json_decode($cart->variation);

                    $variation_detail = [];
                    foreach ($cart->variation as $key => $variation) {
                        $variation_data = Variation::where('id', $key)->with(['variation_items' => function ($q) use ($variation) {
                            $q->where('id', $variation);
                        }])->first()->toArray();
                        $variation_data['variation_price'] = $variation_data['variation_items'][0]['price'];
                        $variation_detail[] = $variation_data;
                        // dd($variation_data);
                    }

                    $cart->variation = $variation_detail;
                }
                // dd($cart->variation , $sum_variation_price);
                $sum_variation_price = ($cart->variation) ? array_sum(array_column($cart->variation, 'variation_price')) : 0;
                $cart->product_sub_total = $cart->quantity * ($cart->product->product_price + $sum_variation_price);
                return $cart;
            });

        $cart_product['sub_total'] = $cart_product['cart']->sum('product_sub_total');
        if ($cart_product) {
            return response()->json(["status" => true, "data" => $cart_product], 200);
        } else {
            return response()->json(["status" => false, "message" => "No data Found"]);
        }
    }


    public function update_cart(Request $request)
    {
        // dd($request , json_decode($request->product_quantity , true));
        $cart_quantity = json_decode($request->cart_quantity, true);
        foreach ($cart_quantity as $cart => $quantity) {
            Cart::where(['id' => $cart, 'user_id' => Auth::user()->id])->update(['quantity' => $quantity]);
        } 
        return response()->json(["status" => true, "message" => "Update Successfully"]);
    }


    public function apply_coupon(Request $request)
    {

        $fields = Validator::make($request->all(), [
            'coupon_code' => 'required',
        ]);
        if ($fields->fails()) {
            return response()->json(["status" => false, "message" => $fields->messages()]);
        }
        $get_cart = Cart::with(['product'])->where(['user_id' => Auth::user()->id])->get();
        // $get_vendor = Product::find($get_cart[0]->product_id);
        $coupon_check = Coupon::where(['user_id' => $get_cart[0]->product->store_id, 'code' => $request->coupon_code])->first();
        // dd($get_cart->toArray() , $coupon_check->toArray());

        if ($coupon_check) {
            if ($coupon_check['expiry_date'] < Carbon::now()->format('Y-m-d')) {
                return response()->json(["status" => false, "message" => "Coupon is expired"]);
            }
            else{
                $cart_product['cart'] = $get_cart
                    ->map(function ($cart) {
                        if ($cart->variation) {
                            $cart->variation = json_decode($cart->variation);

                            $variation_detail = [];
                            foreach ($cart->variation as $key => $variation) {
                                $variation_data = Variation::where('id', $key)->with(['variation_items' => function ($q) use ($variation) {
                                    $q->where('id', $variation);
                                }])->first()->toArray();

                                $variation_data['variation_price'] = $variation_data['variation_items'][0]['price'];
                                $variation_detail[] = $variation_data;
                            }

                            $cart->variation = $variation_detail;
                        }

                        $sum_variation_price = ($cart->variation) ? array_sum(array_column($cart->variation, 'variation_price')) : 0;
                        $cart->product_sub_total = $cart->quantity * ($cart->product->product_price + $sum_variation_price);
                        return $cart;
                    });
                $cart_product['sub_total'] = $cart_product['cart']->sum('product_sub_total');
                // $total = ($coupon_check->discount/$cart_product['sub_total']) * 100;
                $discount = ($cart_product['sub_total']*$coupon_check->discount)/100;
                $total = $cart_product['sub_total'] - $discount;
                // dd($cart_product['sub_total'] , $total ,  $discount , $coupon_check->discount);
                $data['sub_total'] = $cart_product['sub_total'];
                $data['discount_percent'] = $coupon_check->discount.'%';
                $data['discount'] = $discount;
                $data['total'] = $total;
                return response()->json(["status" => true, "data" => $data]);
            }
        } else {
            return response()->json(["status" => false, "message" => "Invalid Coupon"]);
        }
    }




    // public function add_to_cart(Request $request, $product_id)
    // {

    //     $fields = Validator::make($request->all(), [
    //         'quantity' => 'required',
    //     ]);
    //     if ($fields->fails()) {
    //         return response()->json(["status" => false, "message" => $fields->messages()]);
    //     }

    //     $variation = null;
    //     if ($request->variation) {
    //         $array = json_decode($request->variation, true);
    //         ksort($array);
    //         foreach ($array as $key =>  $subArray) {
    //             sort($array[$key]);
    //         }
    //         $variation = json_encode($array);
    //     }

    //     $check_zipcode = Product::with(['store'])->where('id' , $product_id)->first()->toArray();
    //     $zipcode_array = json_decode($check_zipcode['store']['vendor_zipcodes']);

    //     if (in_array(Auth::user()->zipcode,$zipcode_array)) {
    //         $check_store = Cart::with(['product'])->where(['user_id' => Auth::user()->id])->first();
    //         $check_request_store = Product::find($product_id);
    //         if ($check_store && $check_request_store && $check_store['product']['store_id'] != $check_request_store['store_id']) {
    //             return response()->json(["status" => false, "message" => "Please add product from the same store"]);
    //         }
    //         else{
    //             $check_cart = Cart::where(['user_id' => Auth::user()->id, 'product_id' => $product_id, 'variation' => $variation])->first();
    //             // dd($check_cart);
    //             if ($check_cart) {
    //                 $check_cart->quantity = $check_cart->quantity +  $request->quantity;
    //                 $check_cart->instruction = ($request->instruction) ? $request->instruction : $check_cart->instruction;
    //                 $check_cart->save();
    //             } else {
    //                 $add_cart = new Cart();
    //                 $add_cart->product_id = $product_id;
    //                 $add_cart->user_id = Auth::user()->id;
    //                 $add_cart->quantity = $request->quantity;
    //                 $add_cart->instruction = $request->instruction;
    //                 $add_cart->variation = $variation;
    //                 $add_cart->save();
    //             }
    //             return response()->json(["status" => true, "message" => "Added Successfully"]);
    //         }
    //     }
    //     else{
    //         return response()->json(["status" => false, "message" => "Store is not exist in your address"]);
    //     }



    // }

    // public function view_cart(Request $request)
    // {
    //     // dd(Auth::user());
    //     $cart_product['cart'] = Cart::with(['product'])->where(['user_id' => Auth::user()->id])->get()
    //         ->map(function ($cart) {
    //             // dd($cart);
    //             if (is_string($cart->product->customize_item_id)) {
    //                 $cart->product->customize_item_id = json_decode($cart->product->customize_item_id);
    //             }
    //             if ($cart->variation) {
    //                 $cart->variation = json_decode($cart->variation);

    //                 $variation_detail = [];
    //                 foreach ($cart->variation as $key => $variation) {

    //                     $variation_data = Variation::where('id', $key)->with(['variation_items' => function ($q) use ($variation) {
    //                         $q->whereIn('id', $variation);
    //                     }])->first();
    //                     $variation_data['variation_price'] = $variation_data['variation_items']->sum('price');
    //                     $variation_detail[] = $variation_data->toArray();
    //                 }
    //                 $cart->variation = $variation_detail;
    //             }

    //             $sum_variation_price = ($cart->variation) ? array_sum(array_column($cart->variation, 'variation_price')) : 0;
    //             $cart->product_sub_total = $cart->quantity * ($cart->product->product_price + $sum_variation_price);
    //             return $cart;
    //         });

    //     $cart_product['sub_total'] = $cart_product['cart']->sum('product_sub_total');
    //     if ($cart_product) {
    //         return response()->json(["status" => true, "data" => $cart_product], 200);
    //     } else {
    //         return response()->json(["status" => false, "message" => "No data Found"]);
    //     }
    // }


    // public function update_cart(Request $request)
    // {
    //     // dd($request , json_decode($request->product_quantity , true));
    //     $cart_quantity = json_decode($request->cart_quantity, true);
    //     foreach ($cart_quantity as $cart => $quantity) {
    //         Cart::where(['id' => $cart, 'user_id' => Auth::user()->id])->update(['quantity' => $quantity]);
    //     }
    //     return response()->json(["status" => true, "message" => "Update Successfully"]);
    // }


    // public function apply_coupon(Request $request)
    // {

    //     $fields = Validator::make($request->all(), [
    //         'coupon_code' => 'required',
    //     ]);
    //     if ($fields->fails()) {
    //         return response()->json(["status" => false, "message" => $fields->messages()]);
    //     }
    //     $get_cart = Cart::with(['product'])->where(['user_id' => Auth::user()->id])->get();
    //     // $get_vendor = Product::find($get_cart[0]->product_id);
    //     $coupon_check = Coupon::where(['user_id' => $get_cart[0]->product->store_id, 'code' => $request->coupon_code])->first();
    //     // dd($get_cart->toArray() , $coupon_check->toArray());

    //     if ($coupon_check) {
    //         if ($coupon_check['expiry_date'] < Carbon::now()->format('Y-m-d')) {
    //             return response()->json(["status" => false, "message" => "Coupon is expired"]);
    //         }
    //         else{
    //             $cart_product['cart'] = $get_cart
    //                 ->map(function ($cart) {
    //                     if ($cart->variation) {
    //                         $cart->variation = json_decode($cart->variation);

    //                         $variation_detail = [];
    //                         foreach ($cart->variation as $key => $variation) {

    //                             $variation_data = Variation::where('id', $key)->with(['variation_items' => function ($q) use ($variation) {
    //                                 $q->whereIn('id', $variation);
    //                             }])->first();
    //                             $variation_data['variation_price'] = $variation_data['variation_items']->sum('price');
    //                             $variation_detail[] = $variation_data->toArray();
    //                         }
    //                         $cart->variation = $variation_detail;
    //                     }

    //                     $sum_variation_price = ($cart->variation) ? array_sum(array_column($cart->variation, 'variation_price')) : 0;
    //                     $cart->product_sub_total = $cart->quantity * ($cart->product->product_price + $sum_variation_price);
    //                     return $cart;
    //                 });
    //             $cart_product['sub_total'] = $cart_product['cart']->sum('product_sub_total');

    //             // $total = ($coupon_check->discount/$cart_product['sub_total']) * 100;
    //             $discount = ($cart_product['sub_total']*$coupon_check->discount)/100;
    //             $total = $cart_product['sub_total'] - $discount;
    //             // dd($cart_product['sub_total'] , $total ,  $discount , $coupon_check->discount);

    //             $data['sub_total'] = $cart_product['sub_total'];
    //             $data['discount_percent'] = $coupon_check->discount.'%';
    //             $data['discount'] = $discount;
    //             $data['total'] = $total;
    //             return response()->json(["status" => false, "data" => $data]);
    //         }
    //     } else {
    //         return response()->json(["status" => false, "message" => "Invalid Coupon"]);
    //     }
    // }
}
