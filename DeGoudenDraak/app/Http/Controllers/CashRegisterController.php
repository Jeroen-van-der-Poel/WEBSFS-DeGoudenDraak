<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    public function index()
    {
        return view('/cashregister/index');
    }
}
