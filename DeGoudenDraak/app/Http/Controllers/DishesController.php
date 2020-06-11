<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $dishes = Dish::all();

        return view('/cashregister/dishes', compact('dishes'));
    }
}
