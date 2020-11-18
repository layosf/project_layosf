<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class POtop extends Model
{
    protected $table = 'po_top';
    protected $fillable = ['id','po_id', 'material_name', 'delivery_size', 'settlement_size', 'feeding_quantity', 'application_date', 'delivery_date', 'remark'];
    public function po(){
        return $this->hasMany('App\PO', 'id', 'po_id');
    }

    public function scopeBuyerpo(){
        
        $b = DB::table('po_top')
            ->leftJoin('po', 'po_top.po_id', '=', 'po.id')
            ->leftJoin('buyer', 'po.buyer_id', '=', 'buyer.id')
            ->select('po_top.id', 'po_top.po_id', 'po_top.material_name','po_top.delivery_size','po_top.settlement_size', 'po_top.feeding_quantity','po_top.application_date','po_top.delivery_date','po_top.remark','po.order_number','po.order_date', 'buyer.name as buyername')
            ->orderBy('po_top.id', 'desc')
            ->get();
        return $b;
    }
}
