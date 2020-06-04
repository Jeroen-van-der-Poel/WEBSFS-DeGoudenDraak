<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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

    public function store(Request $request)
    {
        $user = auth()->user();
        $now = Carbon::now();

        $order = collect(json_decode($request->get('order1'), true));

        if($order != null){
            foreach($order->unique('id') as $dish)
            {
                $dishes = Dish::find($dish['id']);
                $amount = $dish['amount'];

                $dishes->users()->save($user, ['amount'=>$amount, 'sale_date'=>$now]);
            }
        }

        return redirect('cashregister/index');
    }

    public function filterDishes(){

        $data = request()->validate([
            'filter' => 'required'
        ]);

        $dishes = Dish::where('name',"LIKE", "%" . $data['filter'] . "%")->orWhere('menu_number',"LIKE", "%" . $data['filter']. "%")->orderBy('id', 'asc')->get();
        $dishCategories = array();
        foreach($dishes as $dish){
            if(!in_array($dish->dish_category, $dishCategories)){
                array_push($dishCategories, $dish->dish_category);
            }
           $categories = Category::whereIn('id' ,$dishCategories)->get();
        }

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
