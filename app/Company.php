<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = ['id','code', 'name', 'address', 'country_id', 'province_id', 'city_id', 'phone', 'fax', 'email', 'website', 'desc', 'contact_person'];

    public function country(){
        return $this->hasMany('App\Country', 'id', 'country_id');
    }

    public function province(){
        return $this->hasMany('App\Province', 'id', 'province_id');
    }

    public function city(){
        return $this->hasMany('App\City', 'id', 'city_id');
    }

}
