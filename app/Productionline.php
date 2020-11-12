<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productionline extends Model
{
    protected $table = 'productionline';
    protected $fillable = ['id', 'code', 'name'];

}
