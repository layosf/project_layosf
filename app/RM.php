<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RM extends Model
{
    protected $table = 'rawmaterial';
    protected $fillable = ['id', 'arrival_date', 'partai', 'species_id', 'category_id', 'supplier_id', 'pcs', 'm2', 'm3', 'grade_id', 'invoice_dimention_id','phisic_dimention_id','itemproduct_id','status', 'approval_to'];

    public function species()
    {
        return $this->hasMany('App\Species', 'id', 'species_id');
    }

    public function category(){
        return $this->hasMany('App\Category', 'id', 'category_id');
    }

    public function supplier(){
        return $this->hasMany('App\Supplier', 'id', 'supplier_id');
    }

    public function approvalto(){
        return $this->hasMany('App\User', 'id', 'approval_to');
    }

    public function grade(){
        return $this->hasMany('App\Grade', 'id', 'grade_id');
    }

    public function invDimention(){
        return $this->hasMany('App\Dimention', 'id', 'invoice_dimention_id');
    }

    public function phisDimention(){
        return $this->hasMany('App\Dimention', 'id', 'phisic_dimention_id');
    }

}
