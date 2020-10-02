<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialOffer extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name' , 'discount'];

    public function saveOffer($request)
    {
        $obj = new self();
        $obj->name = $request->get('offer');
        $obj->discount = $request->get('discount');
        $obj->save();
        (new VoucherCode())->saveVoucher($request->get('expiry') , $obj->id);
        return 1;
    }
}
