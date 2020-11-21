<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreementDetail extends Model
{
    protected $table = 'agreement_detail';
    protected $fillable = ['id', 'agreement_id', 'price', 'currency_id','qty_pcs', 'phisic_dimention', 'invoice_dimention'];

    public function agreement(){
        return $this->hasMany('App\Agreement', 'id', 'agreement_id');
    }

    public function currency(){
        return $this->hasMany('App\Currency', 'id', 'currency_id');
    }

    public function phisicDimention(){
        return $this->hasMany('App\Dimention', 'id', 'phisic_dimention');
    }

    public function invDimention(){
        return $this->hasMany('App\Dimention', 'id', 'invoice_dimention');
    }

}
