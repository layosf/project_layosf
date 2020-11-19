<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = ['id','code','name','symbol'];
}