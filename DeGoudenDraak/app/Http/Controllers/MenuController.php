<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();

        return view('home/menu', compact('dishes'));
    }
}
