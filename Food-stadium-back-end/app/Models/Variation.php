<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VariationItem;

class Variation extends Model
{
    use HasFactory;
    // protected $hidden = ['created_at' , 'updated_at'];

    public function variation_items(){
        return $this->hasMany(VariationItem::class, 'variation_id' , 'id');
    }


}
