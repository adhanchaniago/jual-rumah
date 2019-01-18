<?php

namespace App\Http\Controllers\Customer;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rumah;
use Carbon\Carbon;
use App\Angsuran;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders;

        return view($this->viewLocation('customer.order.index'), compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $rumah = Rumah::findOrfail($id);

        return view($this->viewLocation('customer.order.create'), compact(['rumah']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = strtoupper(str_random(10));

        $rumah = Rumah::findOrfail($request->rumah_id);

        try{

            if ($rumah->booked_by) {
                return redirect()->back()->with('message', 'Rumah Tidak Tersedia!')
                ->with('status','Rumah Telah Dibooking!')
                ->with('type','warning');
            }

            $order = Order::create([
                'code' => $code,
                'rumah_id' => $request->rumah_id,
                'user_id' => auth()->id(),
                'valid_until' => Carbon::today()->addDays(7),
                'total' => $request->total
            ]);

            $rumah->booked_by = auth()->id();

            $rumah->save();

            $cicilan = $rumah->harga * 0.1 / 10;

            if($order){

                // angsuran
                for ($i=1; $i <= 10; $i++) { 
                    $order->angsuran()->create([
                        'kode' => strtoupper(str_random(8)),
                        'total' => $cicilan,
                        'tanggal_tempo' => Carbon::now()->addMonths($i)
                    ]);
                }

                if ($request->hasFile('file')) {
                    $order->addMediaFromRequest('file')
                        ->usingName($code)
                        ->toMediaCollection('photo');
                }
                return redirect()->route('user.order.index')->with('message', 'Upload Data Berhasil!')
                ->with('status','Data Successfully Saved!')
                ->with('type','success');
            }


            }catch (\Exception $e){
                return redirect()->back()->with('message', $e->getMessage())
                        ->with('status','Failed to Save Data!')
                        ->with('type','error')
                        ->withInput();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $order = Order::whereCode($code)->first();

        return view($this->viewLocation('customer.order.show'), compact(['order']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
