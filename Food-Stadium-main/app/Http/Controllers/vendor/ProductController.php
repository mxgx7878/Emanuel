<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CustomizeMenu;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Variation;
use App\Models\VariationItem;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;


class ProductController extends Controller
{
    public function product_listing()
    {
        $data = Product::with(['category', 'menu', 'dietary', 'product_images'])->where('store_id', Auth::user()->id)->get();

        // dd($data->toArray());
        if (isset($data)) {
            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }



    public function product_add_update(Request $request, Product $product)
    {

        // return response()->json([$request->dietary_id , $request->variation_id]);

        $fields = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'product_price' => 'required',
            'category_id' => 'required',
            'menu_id' => 'required',
            'feature_image' => ($product->id) ? '' : 'required',
        ]);
        if ($fields->fails()) {
            return response()->json(["status" => false, "message" => $fields->messages()], 200);
        }


        // DB::beginTransaction();
        // try {
        $msg  = $product->id ? "Update Successfully" : "Added Successfully";

        $json_code = null;
        $variation_id = null;

        if ($request->variation_id && $request->variation_id != "null") {
            // $variation_id = $request->variation_id;
            if ($product->id && $product->variation_id) {
                $decode = json_decode($product->variation_id, true);
                foreach ($decode as $key => $variation_id) {
                    $variation_item_id = VariationItem::where('variation_id', $key)->pluck('id')->toArray();
                    $decode[$key] = array_values(array_intersect($variation_item_id, $variation_id)); // array_intersect returns the matches values
                }
                $variation_id = json_encode($decode);
            } else {
                $variation_id = $request->variation_id;
            }
        }

        if ($request->customize_item_id && $request->customize_item_id != 0) {
            $array =  array_map('intval', explode(",", $request->customize_item_id));

            if ($product->id) {
                $get_customize_item_id = CustomizeMenu::where('category_id', $request->category_id)->pluck('id')->toArray();
                $array = array_values(array_intersect($get_customize_item_id, $array)); // array_intersect returns the matches values
            }

            if (!empty($array)) {
                $json_code = json_encode($array);
            }
        }


        if ($request->hasFile('feature_image')) {
            $feature_image = time() . "-" . $request['feature_image']->getClientOriginalName();


            $request['feature_image']->move(public_path('images/productimages'), $feature_image);
            $feature_image_path = "images/productimages/" . $feature_image;

            $product->feature_image = $feature_image_path;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->menu_id = $request->menu_id;
        if ($request->dietary_id && $request->dietary_id != "null") {
            $product->dietary_id = $request->dietary_id;
        }
        $product->store_id = Auth::user()->id;
        $product->is_trending = (($request->is_trending == 1) ? 1 : 0);
        $product->is_popular = (($request->is_popular == 1) ? 1 : 0);
        $product->customize_item_id = $json_code;
        $product->variation_id = $variation_id;




        if ($product->id) {

            $product->save();

            $productimages = ProductImage::where('product_id', $product->id)->pluck('id')->toArray();

            if ($request['product_images']) {
                $product_images_id = array_map('intval', explode(",", $request['product_images']));
                // foreach($productimages as $check_product_image){

                //     if(in_array($check_product_image , $product_images_id) == false){
                //         ProductImage::find($check_product_image)->delete();
                //     }
                // }

                $delete_product_image = array_diff($productimages, $product_images_id);
                ProductImage::whereIn('id', $delete_product_image)->delete();
            }
        } else {
            $product->save();
            if ($request['product_images']) {

                foreach ($request->product_images as $product_image) {

                    $imageName = time() . "-" . $product_image->getClientOriginalName();


                    $product_image->move(public_path('images/productimages'), $imageName);
                    $imagepath = "images/productimages/" . $imageName;

                    $add_product_image = new ProductImage();
                    $add_product_image->product_id = $product->id;
                    $add_product_image->image = $imagepath;
                    $add_product_image->save();
                }
            }
        }
        // DB::commit();
        return response()->json(['status' => true, 'msg' => $msg]);


        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return response()->json(['status'=>false,'msg'=>"Something went wrong"]);
        //     // return response()->json(['status'=>false,'msg'=>$th->getMessage()]);
        // }


    }


    public function multiple_product_image(Request $request, $product)
    {

        $check_product = Product::find($product);

        if ($check_product) {
            if ($request['product_images']) {
                // dd('cheecl');
                foreach ($request['product_images'] as $product_image) {

                    $imageName = time() . "-" . $product_image->getClientOriginalName();


                    $product_image->move(public_path('images/productimages'), $imageName);
                    $imagepath = "images/productimages/" . $imageName;

                    $add_product_image = new ProductImage();
                    $add_product_image->product_id = $product;
                    $add_product_image->image = $imagepath;
                    $add_product_image->save();
                }
            }
            if ($request['feature_image']) {
                $feature_image = time() . "-" . $request['feature_image']->getClientOriginalName();

                $request['feature_image']->move(public_path('images/productimages'), $feature_image);
                $feature_image_path = "images/productimages/" . $feature_image;

                $check_product->feature_image = $feature_image_path;
                $check_product->save();
            }
        } else {
            return response()->json(['status' => false, 'msg' => "Product Not Found"]);
        }
        // DB::commit();
        return response()->json(['status' => true, 'msg' => "Images Uploade Successfully"]);
    }



    public function view_product($product)
    {

        $data = $this->product_detail_method($product);

        if ($data) {
            return response()->json(['status' => true, 'data' => $data['product']]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }


    public function edit_product($product)
    {

        $data['product'] = Product::select('products.*')->with(['product_images' => function ($q) {
            // dd($query);
            $q->select('id', 'product_id', 'image');
        }])->find($product);

        if (isset($data['product'])) {
            if ($data['product']['customize_item_id']) {
                $data['product']['customize_item_id'] = json_decode($data['product']['customize_item_id']);
            }
            if ($data['product']['variation_id']) {
                $data['product']['variation_id'] = json_decode($data['product']['variation_id']);
            }

            return response()->json(['status' => true, 'data' => $data['product']]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }

    public function product_image_delete($productImage)
    {

        $data = ProductImage::find($productImage);
        // dd($data);

        if ($data) {
            // if ($data->image) {
            //     unlink($data->image);
            // }
            $data->delete();
            return response()->json(['status' => true, 'msg' => 'Deleted Succefully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }


    public function trending_product()
    {
        $data = Product::with(['category', 'menu', 'dietary', 'product_images'])->where('is_trending', 1)->get()->map(function ($product) {
            if ($product->customize_item_id) {
                $product->customize_item_id = json_decode($product->customize_item_id);
                $product->customize_menu = CustomizeMenu::whereIn('id', $product->customize_item_id)
                    ->select('id', 'item_name', 'item_pic', 'item_price')->get()->toArray();
            }
            $product['quantity'] = 1;
            return $product;
        })->toArray();
        // dd($data->toArray());
        if (isset($data)) {

            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }

    public function popular_product()
    {
        $data = Product::with(['category', 'menu', 'dietary', 'product_images'])->where('is_popular', 1)->get()->map(function ($product) {
            if ($product->customize_item_id) {
                $product->customize_item_id = json_decode($product->customize_item_id);
                $product->customize_menu = CustomizeMenu::whereIn('id', $product->customize_item_id)
                    ->select('id', 'item_name', 'item_pic', 'item_price')->get()->toArray();
            }
            $product['quantity'] = 1;
            return $product;
        })->toArray();
        // dd(!$data);
        if (isset($data)) {

            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }

    public function filter_product(Request $request)
    {


        // $data = Product::with(['category','menu','dietary','product_images'])
        // ->where('category_id' , $request->category_id)
        // ->orWhere('menu_id' , $request->menu_id)
        // ->orWhere('dietary_id' , isset($request->dietary_id))
        // ->orWhereBetween('product_price', [$request->min_price,$request->max_price])
        // ->get()->toArray();
        // dd($request);

        $category_id = (isset($request->category_id) && $request->category_id != "undefined" ? $request->category_id : null);
        $menu_id = (isset($request->menu_id) && $request->menu_id != "undefined" ? $request->menu_id : null);
        $dietary_id = (isset($request->dietary_id) && $request->dietary_id != "undefined" ? $request->dietary_id : null);
        $min_price = (isset($request->min_price) && $request->min_price != "undefined" ? $request->min_price : null);
        $max_price = (isset($request->max_price) && $request->max_price != "undefined" ? $request->max_price : null);

        $zipcode = (isset($request->zipcode) && $request->zipcode != "undefined" ? $request->zipcode : null);

        $data = Product::with(['category', 'menu', 'dietary', 'product_images', 'store'])
            ->when($category_id, function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->when($menu_id, function ($query, $menu_id) {
                return $query->where('menu_id', $menu_id);
            })
            ->when($dietary_id, function ($query, $dietary_id) {
                return $query->where('dietary_id', $dietary_id);
            })
            ->when($min_price, function ($query, $min_price) {
                return $query->where('product_price', '>=', $min_price);
            })
            ->when($max_price, function ($query, $max_price) {
                return $query->where('product_price', '<=', $max_price);
            })
            ->get()->map(function ($product) use ($zipcode) {
                if ($product->customize_item_id) {
                    $product->customize_item_id = json_decode($product->customize_item_id);
                    $product->customize_menu = CustomizeMenu::whereIn('id', $product->customize_item_id)
                        ->select('id', 'item_name', 'item_pic', 'item_price')->get()->toArray();
                }

                $product['quantity'] = 1;

                if ($zipcode && $product->store['vendor_zipcodes']) {
                    $test = json_decode($product->store['vendor_zipcodes']);
                    if (!in_array($zipcode, $test)) {
                        return null;
                    }
                }

                return $product;
            })->toArray();

        $data = array_filter($data);

        if (isset($data)) {

            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }



    public function all_product()
    {
        $data = Product::with(['category', 'menu', 'dietary', 'product_images'])->get()->map(function ($product) {
            if ($product->customize_item_id) {
                $product->customize_item_id = json_decode($product->customize_item_id);
                $product->customize_menu = CustomizeMenu::whereIn('id', $product->customize_item_id)
                    ->select('id', 'item_name', 'item_pic', 'item_price')->get()->toArray();
            }
            $product['quantity'] = 1;
            return $product;
        })->toArray();

        // dd($data->toArray());
        if (isset($data)) {

            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }

    public function beverage_product()
    {
        $data = Product::with(['category', 'dietary', 'product_images', 'menu'])->where(['menu_id' => 4])->get()->map(function ($product) {
            if ($product->customize_item_id) {
                $product->customize_item_id = json_decode($product->customize_item_id);
                $product->customize_menu = CustomizeMenu::whereIn('id', $product->customize_item_id)
                    ->select('id', 'item_name', 'item_pic', 'item_price')->get()->toArray();
            }
            $product['quantity'] = 1;
            return $product;
        })->toArray();

        // dd($data->toArray());
        if (isset($data)) {

            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }



    public function product_detail($product)
    {

        $data = $this->product_detail_method($product);

        if ($data) {
            return response()->json(['status' => true, 'data' => $data['product']]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }


    public function product_by_zipcode(Request $request , $zipcode){

        // $zipcode = (isset($request->zipcode) ? $request->zipcode : null);
        // dd($zipcode);
        $data = Product::with(['category', 'menu', 'dietary', 'product_images'])->get()->map(function ($product) use ($zipcode){
            if ($product->customize_item_id) {
                $product->customize_item_id = json_decode($product->customize_item_id);
                $product->customize_menu = CustomizeMenu::whereIn('id', $product->customize_item_id)
                    ->select('id', 'item_name', 'item_pic', 'item_price')->get()->toArray();
            }
            $product['quantity'] = 1;

            if ($zipcode && $product->store['vendor_zipcodes']) {
                $test = json_decode($product->store['vendor_zipcodes']);
                if (!in_array($zipcode, $test)) {
                    return null;
                }
            }
            return $product;
        })->toArray();
        $data = array_filter($data);
        // dd($data->toArray());
        if (isset($data)) {

            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }


    public function product_by_store($store_id)
    {
        $data['store_detail'] = tap(User::where(['id'=> $store_id,'user_role' => 3, 'status' => 1])->first(), function($q) {
            if ($q && $q->vendor_zipcodes) {
                $q->vendor_zipcodes = json_decode($q->vendor_zipcodes);
            }
            return $q;
        });

        // dd($data->toArray());
        $data['store_products'] = Product::with(['category', 'dietary', 'product_images', 'menu'])->where(['store_id' => $store_id])->get()->map(function ($product) {
            if ($product->customize_item_id) {
                $product->customize_item_id = json_decode($product->customize_item_id);
                $product->customize_menu = CustomizeMenu::whereIn('id', $product->customize_item_id)
                    ->select('id', 'item_name', 'item_pic', 'item_price')->get()->toArray();
            }
            $product['quantity'] = 1;
            return $product;
        })->toArray();
        if (isset($data['store_detail']) && isset($data['store_products'])) {

            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }

    public function store_list()
    {
        $data = User::where(['user_role' => 3, 'status' => 1])->get();

        if (isset($data)) {

            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'msg' => 'no data found']);
        }
    }



    ////////////////--------------------- methods --------------------////////////////

    public function product_detail_method($product_id)
    {
        $data['product'] = Product::with(['category', 'menu', 'dietary', 'product_images', 'store'])->find($product_id);

        // dd($data['product']);
        if (isset($data['product'])) {

            $customize_menu = "";
            $variation_data = [];

            if ($data['product']['customize_item_id']) {

                $data['product']['customize_item_id'] = json_decode($data['product']['customize_item_id']);

                $customize_menu = CustomizeMenu::whereIn('id', $data['product']['customize_item_id'])->with(['category'])->get()->toArray();
            }

            if ($data['product']['variation_id']) {

                $data['product']['variation_id'] = json_decode($data['product']['variation_id'], true);

                foreach ($data['product']['variation_id'] as $key => $variation_value) {

                    $variation_data[] = Variation::where('id', $key)->with(['variation_items' => function ($query) use ($variation_value) {
                        $query->whereIn('id', $variation_value);
                    }])->first()->toArray();
                }
            }


            $data['product']['customize_menu'] = $customize_menu;
            $data['product']['variation'] = $variation_data;
            $data['product']['quantity'] = 1;
            return $data;
        } else {
            return false;
        }
    }


    // public function customize_menu_multiple_products($data){
    //     // dd($data);
    //     foreach ($data as $key => $value) {
    //         if ($value['customize_item_id']) {

    //             $value['customize_item_id'] = json_decode($value['customize_item_id']);

    //             $data[$key]['customize_menu'] = CustomizeMenu::whereIn('id' , $value['customize_item_id'])->select('id' , 'item_name' , 'item_pic' ,'item_price')->get()->toArray();

    //         }
    //         else{
    //             $data[$key]['customize_menu'] = null;
    //         }
    //     }
    //     return $data;
    // }




}
