<?php

namespace App\Http\Controllers;

use App\Rumah;
use App\Perumahan;
use App\RumahType;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumahs = Rumah::all();

        $listPerumahan = Perumahan::all();

        $rumahType = RumahType::all();

        return view($this->viewLocation('rumah.index'), compact(['rumahs','listPerumahan','rumahType']));
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

            $rumah = Rumah::create([
                'rumah_type_id' => $request->get('rumah_type_id'),
                'perumahan_id' => $request->get('perumahan_id'),
                'block' => $request->get('block'),
                'number' => $request->get('number'),
                'subsidi' => $request->get('subsidi'),
                'harga' => $request->get('price'),
                'description' => $request->get('description'),
            ]);

            if($rumah){
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
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show(Rumah $rumah)
    {
        return view($this->viewLocation('rumah.show'), compact(['rumah']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit(Rumah $rumah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rumah $rumah)
    {
        try{

            $rumah->rumah_type_id = $request->get('rumah_type_id');
            $rumah->perumahan_id = $request->get('perumahan_id');
            $rumah->block = $request->get('block');
            $rumah->number = $request->get('number');
            $rumah->subsidi = $request->get('subsidi');
            $rumah->harga = $request->get('price');
            $rumah->description = $request->get('description');
            $rumah->save();

            if($rumah){
                return redirect()->back()->with('message', 'Update Data Berhasil!')
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
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rumah $rumah)
    {
        //
    }
}
