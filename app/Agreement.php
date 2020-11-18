<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreement';
    protected $fillable = ['id', 'speciess', 'amended1', 'amended2','amended3','startcontract', 'expiredcontract', 'status', 'category_id', 'supplier_id', 'payment_note', 'contactperson_beneficiary', 'taxppn_id', 'taxpph_id', 'currency', 'incoterms', 'transport', 'certificate', 'volumenote', 'qualitynote', 'measurement', 'document', 'dia_allowence','hei_allowence','wid_allowence','leng_allowence','detailnote','sellunit','created_by'];

}
