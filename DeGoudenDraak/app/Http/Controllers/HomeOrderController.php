<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\CustomerDish;
use App\Dish;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeOrderController extends Controller
{
    public function index($id)
    {
        $customer = Customer::findorfail($id);
        $categories = Category::all();
        $dishes = Dish::all();

        return view('orderhome/index', compact('customer', 'categories', 'dishes'));
    }

    public function store($id, Request $request)
    {
        $customer = Customer::findorfail($id);
        $now = Carbon::now();
        $pickup = Carbon::now()->addHours(1);

        if(CustomerDish::orderByDesc('sale_date')->first()->order_number != null){
            $ordernumber = CustomerDish::orderByDesc('sale_date')->first()->order_number  + 1;
        }
        else{
            $ordernumber = 1;
        }

        $order = collect(json_decode($request->get('order1'), true));

        if($order != null){
            foreach($order->unique('id') as $dish)
            {
                $dishes = Dish::find($dish['id']);
                $amount = $dish['amount'];
                $comment = $dish['comment'];

                $dishes->customers()->save($customer, ['amount'=>$amount, 'sale_date'=>$now, 'comment'=>$comment, 'order_number'=>$ordernumber, 'pickup_date'=>$pickup]);
            }
        }
        
        return ['redirect' => route('confirmation', $id)];
    }

    public function confirmation($id)
    {
        $customer = Customer::findorfail($id);

        return view('orderhome/confirmation', compact('customer'));
    }
}
