<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemproduct extends Model
{
    protected $table = 'itemproduct';
    protected $fillable = ['id', 'productcode'];

}
