<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $dishes = Dish::all();

        return view('/cashregister/index', compact('categories', 'dishes'));
    }
}
