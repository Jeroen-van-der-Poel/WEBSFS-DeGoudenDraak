<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Dish;
use App\CustomerHelp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index($id)
    {
        $customer = Customer::findorfail($id);
        $categories = Category::all();
        $dishes = Dish::all();

        return view('customerorder/index', compact('customer', 'categories', 'dishes'));
    }

    public function store($id)
    {
        $customer = Customer::findorfail($id);
        $help = new CustomerHelp();
        $help->customer_id = $customer->id;
        $help->save();

        return redirect('/customer-order/'.$id)->with('success', 'U heeft om hulp gevraagd. Er zal zo een medewerker komen.');
    }

    public function filterDishes($id){

        $data = request()->validate([
            'filter' => 'required'
        ]);

        $customer = Customer::findorfail($id);

        $dishes = Dish::where('name',"LIKE", "%" . $data['filter'] . "%")->orWhere('menu_number',"LIKE", "%" . $data['filter']. "%")->orderBy('id', 'asc')->get();
        $dishCategories = array();
        foreach($dishes as $dish){
            if(!in_array($dish->dish_category, $dishCategories)){
                array_push($dishCategories, $dish->dish_category);
            }
            $categories = Category::whereIn('id' ,$dishCategories)->get();
        }

        return view('/customer-order/'.$id, compact('customer', 'categories', 'dishes'));
    }

    public function filterCategories($id){

        $data = request()->validate([
            'filter' => 'required'
        ]);

        $customer = Customer::findorfail($id);

        $categories = Category::where('name',"LIKE", "%" . $data['filter'] . "%")->orderBy('id', 'asc')->get();
        $dishes = Dish::all();

        return view('/customer-order/'.$id, compact('customer', 'categories', 'dishes'));
    }
}
