<?php

namespace App\Http\Controllers\Customer;

use App\Angsuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kodeAngsuran)
    {
        $angsuran = Angsuran::whereKode($kodeAngsuran)->first();

        return view($this->viewLocation('customer.angsuran.create'), compact(['angsuran']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $angsurans = Angsuran::where('order_id',$order_id)->get();

        return view($this->viewLocation('customer.angsuran.show'), compact(['angsurans']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Angsuran $angsuran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angsuran $angsuran)
    {
        $code = $angsuran->kode;

        try {
            $angsuran->total_payment = $request->total_payment;
            $angsuran->paid = true;
            $angsuran->tanggal_bayar = date('Y-m-d');
            $angsuran->save();

            if ($request->hasFile('file')) {
                    $angsuran->addMediaFromRequest('file')
                        ->usingName($code)
                        ->toMediaCollection('photo');
                }

        if ($angsuran) {
            return redirect()->route('user.angsuran.show', $angsuran->order->id)->with('message', 'Upload Data Berhasil!')
                    ->with('status','Data Successfully Saved!')
                    ->with('type','success');
        }
        } catch (Exception $e) {
            return redirect()->back()->with('message', $e->getMessage())
                        ->with('status','Failed to Save Data!')
                        ->with('type','error')
                        ->withInput();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angsuran $angsuran)
    {
        //
    }
}
