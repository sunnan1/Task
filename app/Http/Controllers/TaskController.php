<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\SpecialOffer;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use SpecialOffer;

    public function index()
    {
        return view('special-offer');
    }
}
