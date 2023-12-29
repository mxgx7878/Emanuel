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
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\VariationItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function order_placed(Request $request)
    {

        $fields = Validator::make($request->all(), [
            // 'user_name' => 'required',
            // 'user_address' => 'required',
            'sub_total' => 'required',
            'total' => 'required',
            'zipcode' => 'required',
            // 'coupon_code' => 'required',
            'products' => 'required',
            // 'delivery_date' => 'required',
            'delivery_type' => 'required',

        ]);
        if ($fields->fails()) {
            return response()->json(["status" => false, "message" => $fields->messages()]);
        }
        // dd($request->products[0]['id']);
        // dd($request->delivery_date , date('d-m-Y', strtotime($request->delivery_date)) , date("d-m-Y") );
        // dd($request->delivery_date , date('d-m-Y', strtotime($request->delivery_date)) , Carbon::createFromTimestamp(strtotime($request->delivery_date))->format('d-m-Y'));
        // dd( json_decode($request->products , true) , $request);
        // $decode_products = json_decode($request->products, true);
        // dd($decode_products , array_key_first($decode_products));
        // $get_vendor_id = Product::find(array_key_first($decode_products))->store_id;
        $get_vendor_id = Product::find($request->products[0]['id'])->store_id;
        // dd($get_vendor_id);

        $order = new Order();
        // if (Auth::user()) {
        // }

        $order->user_id = Auth::user()->id;
        $order->user_name = Auth::user()->name;
        $order->user_address = $request->user_address;
        $order->vendor_id = $get_vendor_id;
        $order->sub_total = $request->sub_total;
        $order->discount = isset($request->discount) ? $request->discount : null;
        $order->total = $request->total;
        $order->zipcode = $request->zipcode;
        $order->coupon_code = isset($request->coupon_code) ? $request->coupon_code : null;
        $order->message = $request->message;
        $order->delivery_date = isset($request->delivery_date) ? date('Y-m-d', strtotime($request->delivery_date)) : date("Y-m-d");
        $order->delivery_type = ($request->delivery_type && $request->delivery_type == 1 ? $request->delivery_type : 0);
        $order->save();


        foreach ($request->products as $key => $value) {
            $request_product_id = $value['id'];
            $selected_variation = null;
            if (isset($value['variation'])) {
                $request_variation_items = $value['variation'];
                $arrray_variation_items = [];
                // $variation_price = 0;
                foreach ($request_variation_items as $key1 => $value1) {
                    $get_variation_item = VariationItem::where('id' , $value1['id'])->with(['variation'])->first();
                    $arrray_variation_items[$get_variation_item['variation']['id']] = $get_variation_item['id'];
                    // $variation_price = $variation_price + $get_variation_item['price'];
                }
                $selected_variation = json_encode($arrray_variation_items);
            }
            // $total_price = $selected_variation * $value['quantity'];
            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $request_product_id;
            $order_product->variation_item = $selected_variation;
            $order_product->quantity = $value['quantity'];
            $order_product->product_price = $value['product_price'];
            // $order_product->quantity = $total_price;
            $order_product->save();
        }


        // foreach ($decode_products as $key => $value) {
        //     $selected_variation = json_encode($value);
        //     $order_product = new OrderProduct();
        //     $order_product->order_id = $order->id;
        //     $order_product->product_id = $key;
        //     $order_product->variation_item = $selected_variation;
        //     $order_product->save();
        // }

        return response()->json(['status' => true, "message" => "Order Placed Succefully"]);
    }

    public function order_detail(Request $request, $order_id)
    {

        $order_detail = tap(Order::with(['user', 'vendor', 'order_products.product'])->find($order_id), function ($query) {

            foreach ($query->order_products as $key => $value) {
                $query->order_products[$key]['variation_item'] = json_decode($value['variation_item'], true);

                if ($query->order_products[$key]['variation_item'] ) {
                    // $query->order_products[$key]['variation_item'];
                    $variation_item = array();
                    foreach ($query->order_products[$key]['variation_item'] as $subkey => $value) {
                        $variation_item[] = VariationItem::where('id', $value)->with(['variation'])->first()->toArray();
                        // $query->order_products[$key]['variation_item'] = $variation_item;
                    }
                    $query->order_products[$key]['variation_item'] = $variation_item;
                }
            }
        });
        // dd($order_detail);
        return response()->json(['status' => true, "data" => $order_detail]);
    }

    public function user_order_listing(Request $request)
    {

        $order = Order::with(['user', 'vendor', 'order_products'])->where('user_id', Auth::user()->id)->get()->map(function ($query) {

            foreach ($query->order_products as $key => $value) {
                $query->order_products[$key]['variation_item'] = json_decode($value['variation_item'], true);
                if ($query->order_products[$key]['variation_item'] ) {
                    foreach ($query->order_products[$key]['variation_item'] as $subkey => $value) {
                        $query->order_products[$key]['variation_item'] = VariationItem::where('id', $value)->with(['variation'])->first()->toArray();
                    }
                }
            }
            return $query;

        })->toArray();

        return response()->json(['status' => true, "data" => $order]);
    }


    public function vendor_order_listing(Request $request)
    {

        $order = Order::with(['user', 'vendor', 'order_products'])->where('vendor_id', Auth::user()->id)->get()->map(function ($query) {

            foreach ($query->order_products as $key => $value) {
                $query->order_products[$key]['variation_item'] = json_decode($value['variation_item'], true);
                if ($query->order_products[$key]['variation_item']) {
                    foreach ($query->order_products[$key]['variation_item'] as $subkey => $value) {
                        $query->order_products[$key]['variation_item'] = VariationItem::where('id', $value)->with(['variation'])->first()->toArray();
                    }
                }
            }
            return $query;
        })->toArray();

        return response()->json(['status' => true, "data" => $order]);
    }


    public function admin_order_listing(Request $request)
    {

        $order = Order::with(['user', 'vendor', 'order_products'])->get()->map(function ($query) {

            foreach ($query->order_products as $key => $value) {
                $query->order_products[$key]['variation_item'] = json_decode($value['variation_item'], true);

                if ($query->order_products[$key]['variation_item'] ) {
                    foreach ($query->order_products[$key]['variation_item'] as $subkey => $value) {
                        $query->order_products[$key]['variation_item'] = VariationItem::where('id', $value)->with(['variation'])->first()->toArray();
                    }
                }
            }
            return $query;
        })->toArray();

        return response()->json(['status' => true, "data" => $order]);
    }
}
