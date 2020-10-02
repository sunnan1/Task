<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Recipient;
use App\Http\Controllers\Traits\SpecialOffer;

class TaskController extends Controller
{
    use SpecialOffer , Recipient;

    public function index()
    {
        return view('special-offer');
    }

    public function createRecipient()
    {
        return view("recipient");
    }

    public function verifyVoucher()
    {
        return view("verify");
    }
}
