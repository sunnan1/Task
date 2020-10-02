<?php

namespace App\Http\Controllers;

use App\Events\ConsumeVoucher;
use App\Events\IsVoucherValid;
use App\Http\Requests\VerificationRequest;
use Facades\App\Models\VoucherTrans;
use Facades\App\Models\Recipient;
use Facades\App\Models\VoucherCode;
use Illuminate\Http\Request;

class APIContrtoller extends Controller
{
    public function validateVoucher(VerificationRequest $request)
    {
        if(!(Recipient::hasEmail($request)))
        {
            return redirect()->back()->withErrors('Invalid email !')->withInput();
        }
        if(! VoucherCode::hasCode($request))
        {
            return redirect()->back()->withErrors('Invalid voucher !')->withInput();
        }
        if(! VoucherTrans::consumed($request))
        {
            $validCodes = VoucherCode::getCodes($request)->get();
            return redirect()->back()->with(['success' => 'Valid and Consumed !' , 'codes' => $validCodes])->withInput();
        }
        else{
            return redirect()->back()->withErrors('Voucher Already consumed !')->withInput();
        }
    }
}
