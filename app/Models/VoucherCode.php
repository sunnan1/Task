<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherCode extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['code' , 'expiry' , 'offer'];

    public function saveVoucher($request , $offer)
    {
        $obj = new self();

    }

    public function setCodeAttribute($value)
    {

    }

}
