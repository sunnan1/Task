<?php

namespace App\Http\Controllers\Traits;

use App\Http\Requests\RecipientRequest;

trait Recipient
{
    public function saveRecipient(RecipientRequest $request)
    {
        if((new \App\Models\Recipient())->saveRecipient($request))
        {
            return redirect()->back()->with(['success' => 'Recipient Saved successfully !']);
        }
        else{
            return redirect()->back()->withErrors('Something wrong while saving recipient !');
        }
    }
}
