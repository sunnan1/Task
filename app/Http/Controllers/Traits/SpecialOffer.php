<?php

namespace App\Http\Controllers\Traits;

use App\Http\Requests\SpecialOfferRequest;
use Illuminate\Http\Request;

trait SpecialOffer
{
    public function saveOffer(SpecialOfferRequest $request)
    {
        if((new \App\Models\SpecialOffer())->saveOffer($request))
        {
            return redirect()->back()->with(['success' => 'Offer saved successfully !']);
        }
        else{
            return redirect()->back()->withErrors("Special offer can't be saved !");
        }
    }
}
