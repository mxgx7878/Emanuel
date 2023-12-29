<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Dietary;
use App\Models\User;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class, 'category_id' , 'id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id' , 'id');
    }
    public function dietary(){
        return $this->belongsTo(Dietary::class, 'dietary_id' , 'id');
    }
    public function store(){
        return $this->belongsTo(User::class, 'store_id' , 'id');
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class, 'product_id' , 'id');
    }


}
