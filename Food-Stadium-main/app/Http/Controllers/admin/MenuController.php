<?php

namespace App\Http\Controllers\admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MenuController extends AdminController
{
  
    public function listing()
    {
        $menu = Menu::all();
        return response()->json(['status'=>true,'data'=>$menu]);
    }

    public function menu_add_update(Request $req,Menu $menu)
    {  
        $msg  = $menu->id ? "Update Successfully" : "Added Successfully";

      $menu->name = $req->name;
      $menu->status = $req->status;
      
      if( $menu->save() )
      {
        return response()->json(['status'=>true,'msg'=>$msg]);
      }
      else
      {
        $msg= 'failed';
        return response()->json(['status'=>false,'msg'=>$msg]);
       }
      
    }


    public function view_menu($menu)
    {
        $data = Menu::where('id',$menu)->first();
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
