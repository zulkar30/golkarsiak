<?php

namespace App\Http\Controllers;

use App\Models\Caleg;
use App\Models\Dapil;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Paket;
use App\Models\Saksi;
use App\Models\Tps;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fullsaksi = Saksi::count();
        $kecamatan = Kecamatan::count();
        $desa = Desa::count();
        $tps = Tps::count();
        $saksiPerKecamatan = Kecamatan::withCount('saksi')->get();
        $kabupatenStats = [
            'total' => Saksi::count(),
        ];
        $dapilData = Dapil::with(['kecamatan.desa'])->get();
        $user = Auth::user();
        $dapilDataUserCam = Dapil::with(['kecamatan.desa.saksi' => function ($query) use ($user) {
            $query->where('kecamatan_id', $user->kecamatan_id);
        }])->get();
        $dapilDataUserDes = Dapil::with(['kecamatan.desa.saksi' => function ($query) use ($user) {
            $query->where('desa_id', $user->desa_id);
        }])->get();
        $saksi = Saksi::all();
        $saksiCaleg = Saksi::where('caleg_id', $user->caleg_id)->get();
        $saksiCalegCount = Saksi::where('caleg_id', $user->caleg_id)->count();
        $saksiPaket1 = Saksi::whereHas('paket', function ($query) {
            $query->where('paket.id', 1);
        })->count();
        $saksiPaket2 = Saksi::whereHas('paket', function ($query) {
            $query->where('paket.id', 2);
        })->count();
        $paket = Paket::all();
        $caleg = Caleg::all();
        $userPaketId = Auth::user()->paket_id;
        $saksiPaket = Saksi::whereHas('paket', function ($query) use ($userPaketId) {
            $query->where('paket.id', $userPaketId);
        })->get();
        $saksiPaketCount = $saksiPaket->count();
        $saksiCalegPaket = Saksi::where('caleg_id', Auth::user()->caleg_id)
                ->whereHas('paket', function ($query) use ($userPaketId) {
                    $query->where('paket.id', $userPaketId);
                })
                ->count();

        return view('pages.dashboard', compact('fullsaksi', 'kecamatan', 'desa', 'tps', 'saksiPerKecamatan', 'kabupatenStats', 'dapilData', 'dapilDataUserCam', 'dapilDataUserDes', 'saksiCaleg', 'saksiCalegCount', 'saksiPaket1', 'saksiPaket2', 'paket', 'saksiPaket', 'saksiPaketCount', 'caleg', 'saksiCalegPaket'));
    }

    public function show($desa_id)
    {
        $desa = Desa::findOrFail($desa_id);
        $totalTPS = $desa->tps->count();
        $saksi = Saksi::all();
        return view('pages.show-tps', compact('desa', 'totalTPS', 'saksi'));
    }
}
