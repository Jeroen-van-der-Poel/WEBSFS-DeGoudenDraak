<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer/index');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'tablenumber' => 'required',
        ]);

        $customer = DB::table('customers')->where([
            ['name', '=', request('name')],
            ['tablenumber', '=', request('tablenumber')],
        ])->first();

        if ($customer != null) {
            return redirect('/customer-order/'.$customer->id);
        }
        else{
            Customer::create($data);
        }

        $customer2 = DB::table('customers')->where([
            ['name', '=', request('name')],
            ['tablenumber', '=', request('tablenumber')],
        ])->first();

        return redirect('/customer-order/'.$customer2->id);
    }
}
