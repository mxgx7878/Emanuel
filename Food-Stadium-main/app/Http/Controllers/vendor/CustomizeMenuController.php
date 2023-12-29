<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomizeMenu;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomizeMenuController extends Controller
{
    public function listing()
    {
        $categories = CustomizeMenu::with('category')->get();
        // dd($categories->toArray());
        return response()->json(['status'=>true,'data'=>$categories]);
    }

    public function customize_menu_add_update(Request $req ,CustomizeMenu $customizemenu){
        // dd($customizemenu);

        

        $msg  = $customizemenu->id ? "Update Successfully" : "Added Successfully";

        if ($req->hasFile('item_pic')) {

            $image = $req->file('item_pic');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/customizemenuimages'), $imageName);
            $imagepath = "images/customizemenuimages/" . $imageName;
            // dd($customizemenu->item_pic);
            // if ($customizemenu->item_pic) {
            //     unlink($customizemenu->item_pic);
            // }

            $customizemenu->item_pic = $imagepath;
        }


        $customizemenu->vendor_id = Auth::user()->id;
        $customizemenu->category_id = $req->category_id;
        $customizemenu->item_name = $req->item_name;
        $customizemenu->item_price = $req->item_price;
        if ($req->status) {
            $customizemenu->status = $req->status;
        }


        if( $customizemenu->save() )
        {
            return response()->json(['status'=>true,'msg'=>$msg]);
        }
        else
        {
            $msg= 'failed';
            return response()->json(['status'=>false,'msg'=>$msg]);
        }

    }

    public function customize_menu_delete($customizemenu){
        // dd($customizemenu);
        $data = CustomizeMenu::where('id',$customizemenu)->first();
        if ($data) {
            // if ($data->item_pic) {
            //     unlink($data->item_pic);
            // }
            $data->delete();
            return response()->json(['status'=>true,'msg'=> 'Deleted Succefully']);
        }
        else{
            return response()->json(['status'=>false,'msg'=> 'no data found']);
        }
    }

    public function view_customize_menu($customizemenu)
    {
        $data = CustomizeMenu::with('category')->where('id',$customizemenu)->first();
        // dd($data->toArray());
        if(isset($data))
        {
            return response()->json(['status'=>true,'data'=>$data]);
        }
        else
        {
            return response()->json(['status'=>false,'msg'=> 'no data found']);
        }

    }

    public function customize_menu_by_category($category){
        $data = CustomizeMenu::with('category')->where('category_id',$category)->get();
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
