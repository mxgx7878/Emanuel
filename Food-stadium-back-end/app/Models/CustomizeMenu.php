<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class CustomizeMenu extends Model
{
    use HasFactory;

    protected $table = "customize_menus";
    protected $hidden = ['created_at' , 'updated_at'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id' , 'id');
    }

    // public function getCategory(){
    //     return $this->h
    // }
}
