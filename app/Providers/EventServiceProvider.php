<?php

namespace App\Providers;

use App\Events\ConsumeVoucher;
use App\Events\IsVoucherValid;
use App\Events\VoucherCodeEvent;
use App\Listeners\MakeVoucherTrans;
use App\Listeners\VerifyEmail;
use App\Listeners\VerifyVoucher;
use App\Listeners\VerifyVoucherValidity;
use App\Listeners\VoucherCodeListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ConsumeVoucher::class => [
            MakeVoucherTrans::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
