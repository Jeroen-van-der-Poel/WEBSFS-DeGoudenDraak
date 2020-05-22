<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        Customer::create($data);

        return redirect('/');
    }
}
