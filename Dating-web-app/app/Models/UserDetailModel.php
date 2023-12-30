<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetailModel extends Model
{
    use HasFactory;

    protected $table = "user_details";

    function userimages()
    {
        return $this->hasOne(UserPhotosModel::class,'user_id','user_id')->select('user_id','image','created_at');
    }

    function usergift()
    {
        return $this->hasMany(GiftPurchaseModel::class,'partner_id','user_id');
    }
    function usernationality()
    {
        return $this->hasOne(Countries::class,'id','nationality');
    }
    

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function countries()
    {
        return $this->hasOne(Countries::class,'id','country');
    }
    public function states()
    {
        return $this->hasOne(States::class,'id','state');
    }
    public function cities()
    {
        return $this->hasOne(Cities::class,'id','city');
    }
    
}
