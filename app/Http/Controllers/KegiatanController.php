<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kegiatan\StoreKegiatan;
use App\Http\Requests\Kegiatan\UpdateKegiatan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Desa;
use App\Models\Caleg;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    // Middleware Auth
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
        // Middleware Gate
        abort_if(Gate::denies('kegiatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = Auth::id();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $caleg = Caleg::all();
        $kegiatan = Kegiatan::orderBy('created_at', 'desc')->get();
        $kegiatanUser = Kegiatan::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        return view('pages.kegiatan.index', compact('kegiatan', 'kegiatanUser', 'kecamatan', 'desa', 'caleg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKegiatan $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['status'] = 2;
        // Kirim data ke database
        $kegiatan = Kegiatan::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Kegiatan');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('kegiatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        abort_if(Gate::denies('kegiatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        abort_if(Gate::denies('kegiatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $caleg = Caleg::all();
        return view('pages.kegiatan.edit', compact('kegiatan', 'kecamatan', 'desa', 'caleg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKegiatan $request, Kegiatan $kegiatan)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['status'] = 2;
        // Update data ke database
        $kegiatan->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Kegiatan');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        abort_if(Gate::denies('kegiatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kegiatan->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Kegiatan');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }

    public function tunda(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->status = 3;
        $kegiatan->keterangan2 = $request->input('keterangan2'); 
        $kegiatan->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menolak Kegiatan');
        return back();
    }

    public function terima($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->status = 1;
        $kegiatan->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menerima Kegiatan');
        return back();
    }
}
