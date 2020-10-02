<?php

namespace App\Models;

use App\Events\ConsumeVoucher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherTrans extends Model
{
    use HasFactory;

    protected $fillable = ['voucher' , 'recipient'];

    public function consumed($request)
    {
        if( ($this->withVoucher($request)->withRecipient($request)->count()) > 0 )
        {
            return 1;
        }
        event(new ConsumeVoucher($request));
        return 0;
    }

    public function scopeWithVoucher($query , $voucher)
    {
        return $query->whereHas("voucher" , function ($q) use ($voucher){
            $q->where("code" , $voucher->get('voucher'));
        });
    }
    public function scopeWithRecipient($query , $recipient)
    {
        return $query->whereHas("recipient" , function ($q) use ($recipient){
            $q->where("email" , $recipient->get('email'));
        });
    }

    public function getValidCodes($request)
    {
        $rec = Recipient::whereEmail($request)->first();
        $voucherCode = VoucherCode::NotExpired()->GetId();
        $trans = self::Rec($rec->id)->GetVId();
        return ($voucherCode->diff($trans))->all();
    }

    public function scopeRec($query , $id)
    {
        return $query->whereRecipient($id);
    }

    public function scopeGetId($query)
    {
        return $query->pluck('id');
    }
    public function scopeGetVId($query)
    {
        return $query->pluck('voucher');
    }

    public function voucher()
    {
        return $this->belongsTo(VoucherCode::class , 'voucher' , 'id');
    }
    public function recipient()
    {
        return $this->belongsTo(Recipient::class , 'recipient' , 'id');
    }
}
