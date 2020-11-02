<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class POcore extends Model
{
    protected $table = 'po_core';
    protected $fillable = ['id','po_id','structure','structure_legend', 'material_name', 'delivery_size', 'settlement_size', 'feeding_quantity', 'application_date', 'delivery_date', 'remark'];
    public function po(){
        return $this->hasMany('App\PO', 'id', 'po_id');
    }

    public function scopeBuyerpo(){
        $b = DB::table('po_core')
            ->leftJoin('po', 'po_core.po_id', '=', 'po.id')
            ->leftJoin('buyer', 'po.buyer_id', '=', 'buyer.id')
            ->select('po_core.id', 'po_core.po_id','po_core.structure','po_core.structure_legend', 'po_core.material_name','po_core.delivery_size','po_core.settlement_size', 'po_core.feeding_quantity','po_core.application_date','po_core.delivery_date','po_core.remark','po.order_number','po.order_date', 'buyer.name as buyername')
            ->get();
        return $b;
    }
}
