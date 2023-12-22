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
}
