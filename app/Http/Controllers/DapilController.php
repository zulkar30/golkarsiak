<?php

namespace App\Http\Controllers;

use App\Models\Dapil;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DapilController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('dapil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dapil = Dapil::orderBy('id', 'asc')->get();
        return view('pages.dapil.index', compact('dapil'));
    }
}
