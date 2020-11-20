<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = 'buyer';
    protected $fillable = ['id','name', 'code','address', 'city_id', 'phone', 'fax', 'email', 'postal_code', 'bankaccount_id'];
}
