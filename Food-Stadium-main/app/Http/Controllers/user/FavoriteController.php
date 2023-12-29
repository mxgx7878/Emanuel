<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add_remove_favorite(Request $request , $product_id){
        // dd($request);
        $check_favorite = Favorite::where(['product_id' => $product_id , 'user_id' => Auth::user()->id])->first();
        // dd($check_favorite);
        if ($check_favorite) {
            Favorite::where(['product_id' => $product_id , 'user_id' => Auth::user()->id])->delete();

            return response()->json(['status' => true , "message" => "Remove from Favorite"]);
        }
        else{
            $add_favorite = new Favorite();
            $add_favorite->product_id = $product_id;
            $add_favorite->user_id = Auth::user()->id;
            $add_favorite->save();

            return response()->json(['status' => true , "message" => "Add to Favorite"]);
        }


    }

    public function favorite_list(Request $request){
        $favorites = Favorite::with(['user' , 'product'])->where(['user_id' => Auth::user()->id])->get();

        return response()->json(['status'=>true,'data'=>$favorites]);
    }

}
