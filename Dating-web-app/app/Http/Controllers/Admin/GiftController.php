<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GiftModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GiftController extends Controller
{
    public function index()
    {
        $data =  GiftModel::all();
        return view('admin.dashboard.gifts.list', compact('data'));
    }

    public function create_view()
    {
        return view('admin.dashboard.gifts.create');
    }

    public function update_view(GiftModel $gift)
    {
        return view('admin.dashboard.gifts.update', compact('gift'));
    }

    public function addupdateGift(Request $req, GiftModel $gift)
    {
        $msg = isset($gift->id) ? "Gift Update SuccessFully" : "Gift Added SuccessFully";

        if (!isset($gift->id)) {
            $this->validate($req, [
                "title" => 'required',
                "image" => 'required',
                "price" => "required"
            ]);

            if ($req->has('image')) {
                $image = $req->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/asset/admin/images/giftimages'), $imageName);
                $imagepath = $imageName;
                $gift->image = $imagepath;
            }
        }

        if ($req->has('image') && isset($gift->id)) {
            File::delete(public_path('admin/asset/admin/images/giftimages/'.$gift->image));
            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/asset/admin/images/giftimages'), $imageName);
            $imagepath = $imageName;
            $gift->image = $imagepath;
        }

        $gift->title = isset($req->title) ? $req->title : $gift->title;
        $gift->price = isset($req->price) ? $req->price : $gift->price;


        if ($gift->save()) {
            return redirect()->route('admin.gift.list')->with('success', $msg);
        }
    }

    public function deleteGift(Request $req, GiftModel $gift)
    {
        File::delete(public_path('admin/asset/admin/images/giftimages/' . $gift->image));
        if ($gift->delete()) {
            return redirect()->route('admin.gift.list')->with('success', "Category Delete Success");
        }
    }
}
