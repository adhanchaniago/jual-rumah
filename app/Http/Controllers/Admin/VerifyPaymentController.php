<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class VerifyPaymentController extends Controller
{
    public function verify(Request $request)
    {
        $order = Order::whereCode($request->code)->first();

        try{

            $order->confirmed = true;
            $order->save();

            if ($order) {
                return redirect()->back()
                    ->with('message', 'Konfirmasi Berhasil!')
                    ->with('status','Pembayaran Telah Dikonfirmasi')
                    ->with('type','success');
            }

        }catch(\Exception $e){
            return redirect()->back()
                    ->with('message', $e->getMessage()())
                    ->with('status','error')
                    ->with('type','error');
        }
    }

}
