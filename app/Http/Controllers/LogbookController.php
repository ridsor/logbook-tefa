<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Logbook;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{
    public function index() {
        $search = request()->get('s');

        $logbook = Logbook::orderByDesc('waktu masuk')->where('nama','like','%'.$search.'%')->get();
        return view('logbook.index',[
            'logbook' => $logbook
        ]);
    }

    public function store_public(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput()->with('validation_waktumasuk',1);
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
 
        // Retrieve a portion of the validated input...
        $validated = $validator->safe()->only(['nama']);

        $logbook = Logbook::create($validated);

        return redirect('/');
    }

    public function update_public($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kegiatan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput()->with('validation_waktukeluar',$id);
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
 
        // Retrieve a portion of the validated input...
        $validated = $validator->safe()->only(['kegiatan']);

        Logbook::where('id',$id)->update([
            'kegiatan' => $validated['kegiatan'],
            'waktu keluar' => date('Y-m-d H:i:s')
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $logbook = Logbook::where('id',$id)->first();
        if($logbook) {
            Logbook::destroy($id);
        }

        return redirect('/logbook');
    }

    public function update(Logbook $logbook, Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'string|max:100',
            'kegiatan' => 'string',
            'waktu_masuk' => 'date_format:Y-m-d H:i:s',
            'waktu_keluar' => 'date_format:Y-m-d H:i:s'
        ]);

        if ($validator->fails()) {
            return redirect('/logbook')
                        ->withErrors($validator)
                        ->withInput()->with('validation_logbook',json_encode($logbook));
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
 
        // Retrieve a portion of the validated input...
        $validated = $validator->safe()->only(['nama','kegiatan','waktu_masuk','waktu_keluar']);

        $logbook->update($validated);

        return redirect('/logbook');
    }

    public function verifikasi(Logbook $logbook, Request $request) {
        $validator = Validator::make($request->all(), [
            'status' => 'string|max:100',
        ]);

        if ($validator->fails()) {
            return redirect('/logbook')
                        ->withErrors($validator)
                        ->withInput()->with('validation_verifikasilogbook',json_encode($logbook));
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
 
        // Retrieve a portion of the validated input...
        $validated = $validator->safe()->only(['status']);

        $logbook->update($validated);

        return redirect('/logbook');
    }
}
