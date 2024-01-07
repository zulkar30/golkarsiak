<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

use Gate;
use Symfony\Component\HttpFoundation\Response;

class PaketController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('paket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paket = Paket::orderBy('id', 'asc')->get();
        return view('pages.paket.index', compact('paket'));
    }

    public function edit(Paket $paket)
    {
        return view('pages.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-paket';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // update to database
        $paket->update($data);

        alert()->success('Berhasil', 'Berhasil Memperbarui Foto paket');
        return redirect()->route('paket');
    }
}
