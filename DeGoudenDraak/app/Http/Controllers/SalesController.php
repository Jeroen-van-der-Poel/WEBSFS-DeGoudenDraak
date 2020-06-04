<?php

namespace App\Http\Controllers;

use App\CustomerDish;
use App\Http\Controllers\Controller;
use App\UserDish;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $customerOrders = CustomerDish::all();
        $userOrders = UserDish::all();

        $revenue = $this->CountRevenue($customerOrders, $userOrders);
        $revenueBTW = $this->CountRevenueBTW($customerOrders, $userOrders);;
        $revenueWithoutBTW = $this->CountRevenueWithoutBTW($customerOrders, $userOrders);;

        return view('/cashregister/sales', compact('customerOrders', 'revenue', 'revenueBTW', 'revenueWithoutBTW', 'userOrders'));
    }

    public function filterSales()
    {
        $data = request()->validate([
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $customerOrders = CustomerDish::where('sale_date', '>=', $data['startDate'])->where('sale_date', '<=', $data['endDate'])->get();
        $userOrders = UserDish::where('sale_date', '>=', $data['startDate'])->where('sale_date', '<=', $data['endDate'])->get();

        $revenue = $this->CountRevenue($customerOrders, $userOrders);
        $revenueBTW = $this->CountRevenueBTW($customerOrders, $userOrders);;
        $revenueWithoutBTW = $this->CountRevenueWithoutBTW($customerOrders, $userOrders);;

        return view('/cashregister/sales', compact('customerOrders', 'revenue', 'revenueBTW', 'revenueWithoutBTW', 'userOrders'));
    }

    public function CountRevenue($customerOrders, $userOrders){
        $revenue = 0;

        foreach($customerOrders as $customerOrder){
            $revenue = $customerOrder->dish->price *$customerOrder->amount;
        }

        foreach($userOrders as $userOrder){
            $revenue += $userOrder->dish->price *$userOrder->amount;
        }
        return $revenue;
    }

    public function CountRevenueBTW($customerOrders, $userOrders){
        $revenue = 0;

        foreach($customerOrders as $customerOrder){
            $revenue = $customerOrder->dish->price * $customerOrder->amount;
        }

        foreach($userOrders as $userOrder){
            $revenue += $userOrder->dish->price *$userOrder->amount;
        }
        $revenueBTW = $revenue * 0.21;

        return $revenueBTW;
    }

    public function CountRevenueWithoutBTW($customerOrders, $userOrders){
        $revenue = 0;

        foreach($customerOrders as $customerOrder){
            $revenue = $customerOrder->dish->price * $customerOrder->amount;
        }

        foreach($userOrders as $userOrder){
            $revenue += $userOrder->dish->price *$userOrder->amount;
        }
        $revenueWithoutBTW = $revenue / 1.21;

        return $revenueWithoutBTW;
    }

}
