<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Dish;
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
}
