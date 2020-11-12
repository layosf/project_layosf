<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimention extends Model
{
    protected $table = 'dimention';
    protected $fillable = ['id', 'thick', 'width', 'length'];
}
