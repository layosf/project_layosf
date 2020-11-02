<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class POdetail extends Model
{
    protected $table = 'po_detail';
    protected $fillable = ['id','po_id', 'species_id', 'tenon', 'surface_effect', 'thick', 'width', 'length', 'pcs_order', 'box_qty', 'pallet_qty', 'colour', 'qty_m2', 'veneer_grade', 'veneer_process', 'veneer_color', 'package', 'pallet', 'bracket_type'];

    public function species(){
        return $this->hasMany('App\Species', 'id', 'species_id');
    }

    public function po(){
        return $this->hasMany('App\PO', 'id', 'po_id');
    }

    public function scopeBuyerpo(){
        $b = DB::table('po_detail')
            ->leftJoin('po', 'po_detail.po_id', '=', 'po.id')
            ->leftJoin('buyer', 'po.buyer_id', '=', 'buyer.id')
            ->leftJoin('species', 'po_detail.species_id', '=', 'species.id')
            ->select('po.id as poid','po.order_number','po.order_date', 'buyer.name as buyername', 'species.name as speciesname', 'po_detail.id','po_detail.tenon', 'po_detail.surface_effect', 'po_detail.thick', 'po_detail.width', 'po_detail.length', 'po_detail.pcs_order', 'po_detail.box_qty', 'po_detail.pallet_qty', 'po_detail.colour', 'po_detail.qty_m2', 'po_detail.veneer_grade', 'po_detail.veneer_process', 'po_detail.veneer_color', 'po_detail.package', 'po_detail.pallet', 'po_detail.bracket_type')
            ->get();
        return $b;
    }

}
