<?php

namespace App\Http\Controllers;

use App\CustomerDish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
/*        if(request('sort')){
            $customerOrders = Customer::orderBy(request('sort'), 'asc')->where('duedate', '>=', $datetime)->get();

        }
        else{
            return view('/cashregister/sales', compact('customerOrders'));
        }*/

        $customerOrders = CustomerDish::all();

        return view('/cashregister/sales', compact('customerOrders'));
    }

}
