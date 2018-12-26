<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class ReportController extends Controller
{
    public function orderConfirmed()
    {
        $orders = Order::whereConfirmed(true)->orderBy('id', 'DESC')->get();

        return view($this->viewLocation('administrator.report.order'), compact(['orders']));
    }

    public function notConfirmed()
    {
        $orders = Order::whereConfirmed(false)->orderBy('id', 'DESC')->get();

        return view($this->viewLocation('administrator.report.order'), compact(['orders']));
    }
}
