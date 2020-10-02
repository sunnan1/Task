<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherCode extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['code' , 'expiry' , 'offer'];

    protected $casts = [
      'expiry' => 'date'
    ];

    public function saveVoucher($expiry , $offer)
    {
        $obj = new self();
        $obj->code = date('Ymdhis');
        $obj->expiry = $expiry;
        $obj->offer = $offer;
        $obj->save();
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = $this->generate($value);
    }

    public function generate($value)
    {
        return str_shuffle($value);
    }

    public function hasCode($request)
    {
        return $this->whereCode($request->get('voucher'))->count() > 0;
    }

    public function scopeNotExpired($query)
    {
        return $query->whereDate('expiry' , '>=' , date('Y-m-d'));
    }

    public function scopeGetId($query)
    {
        return $query->pluck('id');
    }

    public function specialoffer()
    {
        return $this->belongsTo(SpecialOffer::class , 'offer', 'id');
    }

    public function scopeoffer($query)
    {
        return $query->with("specialoffer");
    }

    public function scopeIds($query , $ids)
    {
        return $query->whereIn('id',$ids);
    }

    public function getCodes($request)
    {
        return self::offer()->Ids(\Facades\App\Models\VoucherTrans::getValidCodes($request->get('email')));
    }



}
