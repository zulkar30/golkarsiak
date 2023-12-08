<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class KecamatanController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('kecamatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatan = Kecamatan::orderBy('id', 'asc')->get();
        return view('pages.kecamatan.index', compact('kecamatan'));
    }
}
