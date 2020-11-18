<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseRM extends Model
{
    protected $table = 'warehouse_stock';
    protected $fillable = ['id', 'itemproduct_id', 'qty'];
}
