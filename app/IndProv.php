<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndProv extends Model
{
    protected $table = 'indonesia_provinces';

    protected $fillable = ['id', 'name', 'meta', 'country_id', 'active'];


    public function city()
    {
        return $this->hasMany('App\IndCity', 'id', 'province_id');
    }
}
