<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POrequirement extends Model
{
    protected $table = 'po_requirement';
    protected $fillable = ['id','po_id', 'back_veneer', 'core_board', 'base_layer', 'paint_process', 'brightness', 'delivery_date', 'tenon', 'chamfer', 'product_description', 'surface_thickness', 'mc_range', 'tolerance_thickness', 'back_groove', 'customer_specific_paint', 'customer_follow_order', 'keep_sample'];
    public function po(){
        return $this->hasMany('App\PO', 'id', 'po_id');
    }
}
