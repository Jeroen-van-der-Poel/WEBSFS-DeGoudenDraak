<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $dishes = Dish::all();

        return view('/cashregister/index', compact('categories', 'dishes'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $now = Carbon::now();

        $order = collect(json_decode($request->get('order1'), true));

        if($order != null){
            foreach($order->unique('id') as $dish)
            {
                $dishes = Dish::find($dish['id']);
                $amount = $dish['amount'];
                $comment = $dish['comment'];

                $dishes->users()->save($user, ['amount'=>$amount, 'sale_date'=>$now, 'comment'=>$comment]);
            }
        }

        return redirect('cashregister/index');
    }

}
