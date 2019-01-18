<?php

namespace App\Http\Controllers\Admin;

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
        $angsurans = Angsuran::wherePaid(true)->get();

        return view($this->viewLocation('administrator.angsuran.index'), compact(['angsurans']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(Angsuran $angsuran)
    {
        //
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
       try {
            $angsuran->verified = true;
            $angsuran->save();

        if ($angsuran) {
            return redirect()->route('admin.angsuran.index')->with('message', 'Verifikasi Data Berhasil!')
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
