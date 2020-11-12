<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'supplier';
    protected $fillable = ['id', 'name', 'address', 'country_id', 'province_id','city_id','phone', 'email'];


    public function city()
    {
        return $this->hasMany('App\IndCity', 'id', 'city_id');
    }

    public function country(){
        return $this->hasOne('App\Country', 'id', 'country_id');
    }

    public function province(){
        return $this->hasOne('App\IndProv', 'id', 'province_id');
    }
}
