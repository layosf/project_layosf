<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    protected $table = 'po';
    protected $fillable = ['id','order_number', 'order_date', 'buyer_id', 'back_veneer', 'core_board', 'base_layer', 'paint_process', 'brightness', 'delivery_date', 'tenon', 'chamfer', 'product_description', 'surface_thickness', 'mc_range', 'tolerance_thickness', 'back_groove', 'customer_specific_paint', 'customer_follow_order', 'keep_sample'];

    public function buyer()
    {
        return $this->hasMany('App\Buyer', 'id', 'buyer_id');
    }

    
}
