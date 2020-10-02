<?php

namespace App\Listeners;

use App\Events\ConsumeVoucher;
use App\Models\Recipient;
use App\Models\VoucherCode;
use App\Models\VoucherTrans;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeVoucherTrans
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ConsumeVoucher $event)
    {
        $obj = new VoucherTrans();
        $obj->voucher = $this->getVoucher($event->getData()->get('voucher'));
        $obj->recipient = $this->getRecipient($event->getData()->get('email'));
        $obj->save();

    }

    public function getVoucher($voucher) {
        return VoucherCode::whereCode($voucher)->first()->id;
    }
    public function getRecipient($email) {
        return Recipient::whereEmail($email)->first()->id;
    }
}
