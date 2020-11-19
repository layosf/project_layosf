<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificate';
    protected $fillable = ['id','cert_code','cert_name','fsc_code', 'legend'];
}
