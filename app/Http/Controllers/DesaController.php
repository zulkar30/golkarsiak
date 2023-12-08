<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DesaController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('desa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $desa = Desa::orderBy('id', 'asc')->get();
        return view('pages.desa.index', compact('desa'));
    }
}
