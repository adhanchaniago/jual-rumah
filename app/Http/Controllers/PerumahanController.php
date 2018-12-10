<?php

namespace App\Http\Controllers;

use App\Perumahan;
use Illuminate\Http\Request;

class PerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perumahans = Perumahan::all();

        return view($this->viewLocation('perumahan.index'), compact(['perumahans']));
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
        try{
            $perumahan = Perumahan::create([
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'description' => $request->get('description'),
            ]);

            if ($perumahan) {
                return redirect()->back()->with('message', 'Upload Data Berhasil!')
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
     * @param  \App\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function show(Perumahan $perumahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perumahan $perumahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perumahan $perumahan)
    {
        try{
            $perumahan = $perumahan->update([
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'description' => $request->get('description'),
            ]);

            if ($perumahan) {
                return redirect()->back()->with('message', 'Edit Data Berhasil!')
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perumahan $perumahan)
    {
        //
    }
}
