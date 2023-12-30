<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftPurchaseModel extends Model
{
    use HasFactory;
    protected $table = "gifts_purchase";

    public function gift()
    {
        return $this->hasOne(GiftModel::class,'id','gift_id');
    }
}
