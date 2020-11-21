<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseLocation extends Model
{
    protected $table = 'warehouse_location';
    protected $fillable = ['id', 'code', 'location'];
}
