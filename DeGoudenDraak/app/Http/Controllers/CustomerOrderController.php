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
}
