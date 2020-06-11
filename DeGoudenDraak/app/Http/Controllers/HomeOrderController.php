<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\CustomerDish;
use App\Dish;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\copy_to_string;

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

        if(CustomerDish::orderByDesc('sale_date')->first() != null && CustomerDish::orderByDesc('sale_date')->first()->order_number != null){
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

        return redirect('/home-order/'.$id);
    }

    public function confirmation($id)
    {
        $customer = Customer::findorfail($id);
        $ordernumber = $customer->dishes()->orderByDesc('sale_date')->first()->pivot->order_number;
        $dishes = $customer->dishes()->wherePivot('order_number', '=',  $ordernumber)->get();

        $dishesnumbers = Array();

        foreach ($dishes as $dish){
            if(!in_array($dish->menu_number, $dishesnumbers)){
                array_push($dishesnumbers, $dish->menu_number);
            }
        }

        $string = "";
        foreach ($dishesnumbers as $number) {
            $string2 = $number . ",";
            $string .= $string2;
        }

        return view('orderhome/confirmation', compact('customer', 'ordernumber', 'dishes', 'string'));
    }
}