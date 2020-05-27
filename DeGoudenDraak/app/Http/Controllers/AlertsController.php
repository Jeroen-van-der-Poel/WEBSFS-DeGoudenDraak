<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlertsController extends Controller
{
    public function index()
    {
        return view('/cashregister/alerts');
    }
}
