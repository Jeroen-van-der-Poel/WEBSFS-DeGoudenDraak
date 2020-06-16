<?php

namespace App\Http\Controllers;

use App\CustomerHelp;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlertsController extends Controller
{
    public function index()
    {
        $alerts = CustomerHelp::get()->whereNull('finished');

        return view('/cashregister/alerts', compact('alerts'));
    }

    public function update($id){
        $customerHelp = CustomerHelp::findorfail($id);
        $customerHelp->finished = Carbon::now();
        $customerHelp->save();


        return redirect('/cashregister/alerts')->with('success', 'Notificatie is afgehandeld!');
    }
}
