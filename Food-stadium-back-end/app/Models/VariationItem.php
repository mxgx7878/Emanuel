<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Variation;

class VariationItem extends Model
{
    use HasFactory;
    protected $hidden = ['created_at' , 'updated_at'];

    public function variation(){
        return $this->belongsTo(Variation::class, 'variation_id' , 'id');
    }

}
