<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'process_production';
    protected $fillable = ['id','code', 'name'];
}
