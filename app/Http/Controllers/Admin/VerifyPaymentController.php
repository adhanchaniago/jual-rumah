<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Notifications\OrderApprovedNotification;
use App\Notifications\OrderRejectedNotification;

class VerifyPaymentController extends Controller
{
    public function verify(Request $request)
    {
        $order = Order::whereCode($request->code)->first();

        try{

            $order->confirmed = true;
            $order->save();

            if ($order) {
                // send notification
                $order->user->notify(new OrderApprovedNotification($order));
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

    public function reject(Request $request)
    {
        $order = Order::whereCode($request->code)->first();

        $order->rumah()->update([
            'booked_by' => null
        ]);

        try{

            $order->rejected = true;
            $order->save();

            if ($order) {
                // send notification
                $order->user->notify(new OrderRejectedNotification($order));
                return redirect()->back()
                    ->with('message', 'Pembatalan Berhasil!')
                    ->with('status','Status Telah Dibatalakan')
                    ->with('type','warning');
            }

        }catch(\Exception $e){
            return redirect()->back()
                    ->with('message', $e->getMessage()())
                    ->with('status','error')
                    ->with('type','error');
        }
    }

}
