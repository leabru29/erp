<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;

class ComprasController extends Controller
{
    public function index()
    {
        return view('compras::index');
    }
}
