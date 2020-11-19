<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreement';
    protected $fillable = ['id','code','amended','startcontract', 'expiredcontract',  'category_id', 'species_id', 'vol_m3','supplier_id', 'paymentnote', 'beneficiary_id', 'taxppn_id', 'taxpph_id', 'currency_id', 'transport', 'certificate_id', 'volumenote', 'qualitynote', 'measurement', 'document', 'created_by','status'];

    public function suppliers(){
        return $this->hasMany('App\Supplier', 'id', 'supplier_id');
    }

    public function beneficiary(){
        return $this->hasMany('App\Company', 'id', 'beneficiary_id');
    }


}
