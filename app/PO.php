<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    protected $table = 'po';
    protected $fillable = ['id','order_number', 'order_date', 'buyer_id'];

    public function buyer()
    {
        return $this->hasMany('App\Buyer', 'id', 'buyer_id');
    }

    
}
