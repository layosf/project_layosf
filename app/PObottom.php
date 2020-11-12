<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PObottom extends Model
{
    protected $table = 'po_bottom';
    protected $fillable = ['id','po_id', 'material_name', 'delivery_size', 'settlement_size', 'feeding_quantity', 'application_date', 'delivery_date', 'remark'];
    public function po(){
        return $this->hasMany('App\PO', 'id', 'po_id');
    }

    public function scopeBuyerpo(){
        $b = DB::table('po_bottom')
            ->leftJoin('po', 'po_bottom.po_id', '=', 'po.id')
            ->leftJoin('buyer', 'po.buyer_id', '=', 'buyer.id')
            ->select('po_bottom.id', 'po_bottom.po_id', 'po_bottom.material_name','po_bottom.delivery_size','po_bottom.settlement_size', 'po_bottom.feeding_quantity','po_bottom.application_date','po_bottom.delivery_date','po_bottom.remark','po.order_number','po.order_date', 'buyer.name as buyername')
            ->get();
        return $b;
    }
}
