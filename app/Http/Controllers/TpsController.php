<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TpsController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('tps_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tps = Tps::orderBy('id', 'asc')->get();
        return view('pages.tps.index', compact('tps'));
    }
}
