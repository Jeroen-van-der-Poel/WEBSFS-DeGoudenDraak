<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Dish;
use App\CustomerHelp;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index($id)
    {
        $customer = Customer::findorfail($id);
        $categories = Category::all();
        $dishes = Dish::all();
        $waittime = 0;
        $iswaiting = false;

        if($customer->dishes()->first() != null &&
            $customer->dishes()->first()->customers()->first()->id == $customer->id &&
            $customer->dishes()->first()->customers()->first()->tablenumber != null)
        {
            $last = $customer->dishes()->orderByDesc('sale_date')->first()->pivot->sale_date;
            $between = Carbon::now()->diffInMinutes($last);
            $waittime = $between;
            if ($between < 10){
                $iswaiting = true;
            }
        }

        return view('customerorder/index', compact('customer', 'categories', 'dishes', 'waittime', 'iswaiting'));
    }

    public function store($id, Request $request)
    {
        $customer = Customer::findorfail($id);
        $now = Carbon::now();

        $order = collect(json_decode($request->get('order1'), true));

       if($order != null){
           foreach($order->unique('id') as $dish)
           {
               $dishes = Dish::find($dish['id']);
               $amount = $dish['amount'];

               $dishes->customers()->save($customer, ['amount'=>$amount, 'sale_date'=>$now]);
           }
       }

        return redirect('/customer-order/'.$id);
    }

    public function help($id)
    {
        $customer = Customer::findorfail($id);
        $help = new CustomerHelp();
        $help->customer_id = $customer->id;
        $help->save();

        return redirect('/customer-order/'.$id)->with('success', 'U heeft om hulp gevraagd. Er zal zo een medewerker komen.');
    }

}
