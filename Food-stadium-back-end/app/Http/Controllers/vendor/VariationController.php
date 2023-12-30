<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CustomizeMenu;
use App\Models\ProductImage;
use App\Models\Variation;
use App\Models\VariationItem;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;



class VariationController extends Controller
{
    //---------- variation ---------//////

    public function variation_list(Request $request){
        // dd('checl');
        $variation = Variation::where('user_id' , Auth::user()->id)->withCount('variation_items')->get();
        return response()->json(['status'=>true,'data'=>$variation]);
    }

    public function view_variation($variation)
    {
        $data = Variation::where('id',$variation)->with('variation_items')->first();
        if(isset($data))
        {
            return response()->json(['status'=>true,'data'=>$data]);
        }
        else
        {
            return response()->json(['status'=>false,'msg'=> 'no data found']);
        }



    }


    public function variation_add_update(Request $request , Variation $variation)
    {
        $msg  = $variation->id ? "Update Successfully" : "Added Successfully";

        $fields = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        if($fields->fails()){
            return response()->json(["status" => false, "message" => $fields->messages()], 200);
        }




      $variation->user_id = Auth::user()->id;
      $variation->name = $request->name;

      if( $variation->save() )
      {
        return response()->json(['status'=>true,'msg'=>$msg]);
      }
      else
      {
        $msg= 'failed';
        return response()->json(['status'=>false,'msg'=>$msg]);
       }

    }

    public function variation_delete($variation_id){
        $variation = Variation::where('id',$variation_id)->delete();
        $variation_item = VariationItem::where('variation_id' , $variation_id)->delete();
        return response()->json(['status'=>true,'msg'=>"Record Deleted"]);
    }



    //---------- variation item ---------//////

    public function variation_item_add_update(Request $request , VariationItem $variation_item){
        // dd($request);

        $msg  = $variation_item->id ? "Update Successfully" : "Added Successfully";

        $fields = Validator::make($request->all(),[
            'title' => 'required',
            'variation_id' => 'required',
            'price' => 'required',
            'image' => ($variation_item->id) ? '' : 'required',
        ]);
        if($fields->fails()){
            return response()->json(["status" => false, "message" => $fields->messages()], 200);
        }


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/variationitemimages'), $imageName);
            $imagepath = "images/variationitemimages/" . $imageName;
            // dd($variationitem->image);
            // if ($variationitem->image) {
            //     unlink($variationitem->image);
            // }

            $variation_item->image = $imagepath;
        }

        $variation_item->variation_id = $request->variation_id;
        $variation_item->title = $request->title;
        $variation_item->price = $request->price;

        if( $variation_item->save() )
        {
            return response()->json(['status'=>true,'msg'=>$msg]);
        }
        else
        {
            $msg= 'failed';
            return response()->json(['status'=>false,'msg'=>$msg]);
        }

    }


    public function view_variation_item($variation_item)
    {
        $data = VariationItem::with('variation')->where('id',$variation_item)->first();
        if(isset($data))
        {
            return response()->json(['status'=>true,'data'=>$data]);
        }
        else
        {
            return response()->json(['status'=>false,'msg'=> 'no data found']);
        }

    }

    public function get_item_by_variation($variation)
    {
        // $array = [3 => [1 ,12 ,2 ,3] , 2 =>  [1 ,12 ,2 ,3],  5 =>  [1 ,12 ,2 ,3]];
        // // foreach($array as $key => $array){
        // //     $newarray[] = $key;
        // // }
        // // dd($newarray);
        // $json_code = json_encode($array);
        // dd($array , json_encode($array) , gettype(json_encode($array)) , json_decode($json_code , true));

        $data = VariationItem::where('variation_id',$variation)->get();
        if(isset($data))
        {
            return response()->json(['status'=>true,'data'=>$data]);
        }
        else
        {
            return response()->json(['status'=>false,'msg'=> 'no data found']);
        }

    }

    public function variation_item_delete($variation_item_id){
        $variation_item = VariationItem::where('id' , $variation_item_id)->delete();
        return response()->json(['status'=>true,'msg'=>"Record Deleted"]);
    }

}
