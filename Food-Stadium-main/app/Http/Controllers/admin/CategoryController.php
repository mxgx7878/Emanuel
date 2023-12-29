<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends AdminController
{

    public function listing()
    {
        $categories = Category::all();
        return response()->json(['status'=>true,'data'=>$categories]);
    }   

    public function category_add_update(Request $req,Category $category)
    {
        $msg  = $category->id ? "Update Successfully" : "Added Successfully";



       if ($req->hasFile('image')) {

            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categoryimages'), $imageName);
            $imagepath = "images/categoryimages/" . $imageName;
            $category->image = $imagepath;
        }

      $category->name = $req->name;
      $category->status = $req->status;

      if( $category->save() )
      {
        return response()->json(['status'=>true,'msg'=>$msg]);
      }
      else
      {
        $msg= 'failed';
        return response()->json(['status'=>false,'msg'=>$msg]);
       }

    }


    public function view_category($category)
    {
        $data = Category::where('id',$category)->first();
        if(isset($data))
        {
            return response()->json(['status'=>true,'data'=>$data]);
        }
        else
        {
            return response()->json(['status'=>false,'msg'=> 'no data found']);
        }



    }

}
