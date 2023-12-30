<?php

namespace App\Http\Controllers\admin;

use App\Models\Dietary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DietaryController extends AdminController
{
  
    public function listing()
    {
        $dietary = Dietary::all();
        return response()->json(['status'=>true,'data'=>$dietary]);
    }

    public function dietary_add_update(Request $req,Dietary $dietary)
    {  
        $msg  = $dietary->id ? "Update Successfully" : "Added Successfully";

      $dietary->name = $req->name;
      $dietary->status = $req->status;
      
      if( $dietary->save() )
      {
        return response()->json(['status'=>true,'msg'=>$msg]);
      }
      else
      {
        $msg= 'failed';
        return response()->json(['status'=>false,'msg'=>$msg]);
       }
      
    }


    public function view_dietary($dietary)
    {
        $data = Dietary::where('id',$dietary)->first();
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
