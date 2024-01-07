<?php

namespace App\Http\Controllers;

use App\Http\Requests\Saksi\StoreSaksi;
use App\Http\Requests\Saksi\UpdateSaksi;
use App\Models\Caleg;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Paket;
use App\Models\Saksi;
use App\Models\Tps;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use File;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;

class SaksiController extends Controller
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
        abort_if(Gate::denies('saksi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = FacadesAuth::id();
        $saksi = Saksi::orderBy('created_at', 'desc')->get();
        $saksiUser = Saksi::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $tps = Tps::all();
        $caleg = Caleg::all();
        $paketData = Paket::all();
        return view('pages.saksi.index', compact('saksi', 'saksiUser', 'kecamatan', 'desa', 'tps', 'caleg', 'paketData'));
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
    public function store(StoreSaksi $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['no_hp'] = '62' . preg_replace('/[^0-9]/', '', $data['no_hp']);
        $data['umur'] = str_replace(' Tahun', '', $data['umur']);

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-saksi';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // dd($data);
        // Kirim data ke database
        $saksi = Saksi::create($data);

        $saksi->paket()->sync($request->input('paket', []));

        // dd($saksi);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Saksi');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('saksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Saksi $saksi)
    {
        abort_if(Gate::denies('saksi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.saksi.show', compact('saksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Saksi $saksi)
    {
        abort_if(Gate::denies('saksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $tps = Tps::all();
        $caleg = Caleg::all();
        $paketData = Paket::all();
        $saksi->load('paket');
        return view('pages.saksi.edit', compact('saksi', 'kecamatan', 'desa', 'tps', 'caleg', 'paketData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaksi $request, Saksi $saksi)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['no_hp'] = '62' . preg_replace('/[^0-9]/', '', $data['no_hp']);
        $data['umur'] = str_replace(' Tahun', '', $data['umur']);

        // upload process here
        // change format foto
        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-saksi';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // Update data ke database
        $saksi->update($data);

        $saksi->paket()->sync($request->input('paket', []));

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Saksi');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('saksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saksi $saksi)
    {
        abort_if(Gate::denies('saksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $saksi['foto'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $saksi->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Saksi');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }

    public function getDesa(Request $request)
    {
        $kecamatanId = $request->input('kecamatan_id');
        $desa = Desa::where('kecamatan_id', $kecamatanId)->get();
        return response()->json($desa);
    }

    public function getTps(Request $request)
    {
        $desaId = $request->input('desa_id');
        $tps = Tps::where('desa_id', $desaId)->get();
        return response()->json($tps);
    }
}
