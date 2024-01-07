<?php

namespace App\Http\Controllers;

use App\Models\Caleg;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CalegController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('caleg_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caleg = Caleg::orderBy('id', 'asc')->get();
        return view('pages.caleg.index', compact('caleg'));
    }

    public function edit(Caleg $caleg)
    {
        return view('pages.caleg.edit', compact('caleg'));
    }

    public function update(Request $request, Caleg $caleg)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-caleg';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // update to database
        $caleg->update($data);

        alert()->success('Berhasil', 'Berhasil Memperbarui Foto caleg');
        return redirect()->route('caleg');
    }
}
