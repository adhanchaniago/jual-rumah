<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rumah;

class UploadPhotoController extends Controller
{
    public function upload(Request $request)
    {
        $rumah = Rumah::findOrfail($request->rumah_id);
        try {
            if ($request->hasFile('file')) {
                $rumah->addMediaFromRequest('file')
                        ->usingName($request->name)
                        ->toMediaCollection('photo');
            }
            return redirect()->back()
                ->with('message', 'Data Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', $e->getMessage())
                ->with('status','error')
                ->with('type','error');
        }
    }
}
