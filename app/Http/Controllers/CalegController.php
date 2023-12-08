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
}
