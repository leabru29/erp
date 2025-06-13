<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;

class RHController extends Controller
{
    public function index()
    {
        return view('rh::index');
    }
}
