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

    public function filterDishes(){

        $data = request()->validate([
            'filter' => 'required'
        ]);

        $categories = Category::all();
        $dishes = Dish::where('name',"LIKE", "%" . $data['filter'] . "%")->orWhere('menu_number',"LIKE", "%" . $data['filter']. "%")->orderBy('id', 'desc')->get();
        return view('/cashregister/index', compact('categories', 'dishes'));
    }

    public function filterCategories(){

        $data = request()->validate([
            'filter' => 'required'
        ]);

        $categories = Category::where('name',"LIKE", "%" . $data['filter'] . "%")->orderBy('id', 'asc')->get();
        $dishes = Dish::all();

        return view('/cashregister/index', compact('categories', 'dishes'));
    }
}
