<?php

namespace Modules\Estoque\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        return view('estoque::index');
    }
}
