@extends('layouts.app')

@section('title', 'Dashboard')

@can('content')
    @section('content')
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">

                {{-- show error --}}
                @if ($errors->any())
                    <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- breadcumb --}}
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">Dashboard</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Aktifitas</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row justify-content-center mb-2">
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset('assets/images/logo-golkar2.png') }}" class="img-thumbnail img-fluid"
                                    style="height: 100px;">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset('assets/images/erlangga.jpg') }}" class="img-thumbnail img-fluid"
                                    style="height: 100px;">
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset('assets/images/syamsuar.jpg') }}" class="img-thumbnail img-fluid"
                                    style="height: 100px;">
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset('assets/images/indra.jpg') }}" class="img-thumbnail img-fluid"
                                    style="height: 100px;">
                            </div>
                        </div>
                    </div>
                </div>

                @can('korkab_dapil')
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-tabs justify-content-center" id="DapilSiak" role="tablist">
                                <li class="nav-item m-1" role="presentation">
                                    <button class="nav-link active btn-sm" id="home-tab" data-toggle="tab"
                                        data-target="#fullsaksisiak" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Dashboard</button>
                                </li>
                                <li class="nav-item m-1" role="presentation">
                                    <button class="nav-link btn-sm" id="home-tab" data-toggle="tab" data-target="#DapilSiak1"
                                        type="button" role="tab" aria-controls="home" aria-selected="true">Dapil 1</button>
                                </li>
                                <li class="nav-item m-1" role="presentation">
                                    <button class="nav-link btn-sm" id="profile-tab" data-toggle="tab" data-target="#DapilSiak2"
                                        type="button" role="tab" aria-controls="profile" aria-selected="false">Dapil 2</button>
                                </li>
                                <li class="nav-item m-1" role="presentation">
                                    <button class="nav-link btn-sm" id="contact-tab" data-toggle="tab" data-target="#DapilSiak3"
                                        type="button" role="tab" aria-controls="contact" aria-selected="false">Dapil 3</button>
                                </li>
                                <li class="nav-item m-1" role="presentation">
                                    <button class="nav-link btn-sm" id="contact-tab" data-toggle="tab" data-target="#DapilSiak4"
                                        type="button" role="tab" aria-controls="contact" aria-selected="false">Dapil 4</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endcan

                @can('korcam_dapil')
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-tabs justify-content-center" id="DapilSiak" role="tablist">
                                <li class="nav-item m-1" role="presentation">
                                    <button class="nav-link active btn-sm" id="home-tab" data-toggle="tab"
                                        data-target="#fullsaksisiak" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Dashboard</button>
                                </li>
                                @foreach ($dapilData as $dapil)
                                    @if (Auth::user()->kecamatan->dapil->id == $dapil->id)
                                        <li class="nav-item m-1" role="presentation">
                                            <button class="nav-link btn-sm" data-toggle="tab"
                                                data-target="#DapilSiak{{ $dapil->id }}" type="button" role="tab"
                                                aria-controls="home" aria-selected="true">Dapil {{ $dapil->id }}</button>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endcan

                @can('kordes_dapil')
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-tabs justify-content-center" id="DapilSiak" role="tablist">
                                <li class="nav-item m-1" role="presentation">
                                    <button class="nav-link active btn-sm" id="home-tab" data-toggle="tab"
                                        data-target="#fullsaksisiak" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Dashboard</button>
                                </li>
                                @foreach ($dapilData as $dapil)
                                    @if (Auth::user()->desa->kecamatan->dapil->id == $dapil->id)
                                        <li class="nav-item m-1" role="presentation">
                                            <button class="nav-link btn-sm" data-toggle="tab"
                                                data-target="#DapilSiak{{ $dapil->id }}" type="button" role="tab"
                                                aria-controls="home" aria-selected="true">Dapil {{ $dapil->id }}</button>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endcan

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active mt-4" id="fullsaksisiak" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1"
                                                    style="color: #F4CE14">Full
                                                    Data Saksi</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $fullsaksi . ' Orang' }}</div>
                                                    </div>
                                                    <div class="col ml-2 mr-0">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: {{ $fullsaksi }}%" aria-valuenow="50"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                    viewBox="0 0 24 24" style="fill: #F4CE14;transform: ;msFilter:;">
                                                    <path
                                                        d="M6.012 18H21V4a2 2 0 0 0-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1zM8 6h9v2H8V6z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- KECAMATAN -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-danger shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Jumlah Kecamatan</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $kecamatan . ' Kecamatan' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgb(213, 102, 102);transform: ;msFilter:;">
                                                    <path
                                                        d="m2.6 13.083 3.452 1.511L16 9.167l-6 7 8.6 3.916a1 1 0 0 0 1.399-.85l1-15a1.002 1.002 0 0 0-1.424-.972l-17 8a1.002 1.002 0 0 0 .025 1.822zM8 22.167l4.776-2.316L8 17.623z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- DESA -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Jumlah Desa</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $desa . ' Desa' }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                    viewBox="0 0 24 24" style="fill: rgb(4, 246, 69);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- TPS -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Jumlah TPS</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $tps . ' TPS' }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                    viewBox="0 0 24 24" style="fill: rgb(70, 79, 244);transform: ;msFilter:;">
                                                    <path
                                                        d="m12 17 1-2V9.858c1.721-.447 3-2 3-3.858 0-2.206-1.794-4-4-4S8 3.794 8 6c0 1.858 1.279 3.411 3 3.858V15l1 2z">
                                                    </path>
                                                    <path
                                                        d="m16.267 10.563-.533 1.928C18.325 13.207 20 14.584 20 16c0 1.892-3.285 4-8 4s-8-2.108-8-4c0-1.416 1.675-2.793 4.267-3.51l-.533-1.928C4.197 11.54 2 13.623 2 16c0 3.364 4.393 6 10 6s10-2.636 10-6c0-2.377-2.197-4.46-5.733-5.437z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FULL DATA SAKSI -->
                        <div class="tab-pane fade show" id="fullsaksi" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card shadow mb-4">
                                <a href="#Full" class="d-block card-header" style="background-color: #F4CE14"
                                    data-toggle="collapse" role="button" aria-expanded="true"
                                    aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-white">Full Data Saksi</h6>
                                </a>
                                <div class="collapse show" id="Full">
                                    <div class="card-body">
                                        <h4 class="small font-weight-bold ">Full Data Saksi<span class="float-right">
                                                {{ $fullsaksi . ' Orang' }}</span></h4>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                                role="progressbar" aria-valuemin="0" aria-valuemax="1.000"
                                                style="width:{{ $fullsaksi }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FULL DATA SAKSI DAN KECAMATAN -->
                        <div class="card shadow mb-4">
                            <a href="#Saksi" class="d-block card-header bg-danger" data-toggle="collapse" role="button"
                                aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-white  ">Full Data Saksi / Kecamatan</h6>
                            </a>
                            <div class="row">
                                @foreach ($saksiPerKecamatan as $spk)
                                    <div class="col-lg-6">
                                        <div class="collapse show" id="{{ 'Saksi' . $spk->id }}">
                                            <div class="card-body">
                                                <h4 class="small font-weight-bold">Data Saksi
                                                    {{ $spk->nama_kecamatan }}<span class="float-right">
                                                        {{ $spk->saksi_count }} Orang</span></h4>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                                        role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: {{ $spk->saksi_count }}%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @can('korkab_dapil')
                        @foreach ($dapilData as $dapil)
                            <div class="tab-pane fade show" id="DapilSiak{{ $dapil->id }}" role="tabpanel"
                                aria-labelledby="home-tab">
                                @foreach ($dapil->kecamatan as $kecamatan)
                                    <a href="#Kecamatan{{ $kecamatan->id }}" class="d-block card-header"
                                        style="background-color: #F4CE14" data-toggle="collapse" role="button"
                                        aria-expanded="true" aria-controls="collapseCardExample" style="text-decoration: none">
                                        <h6 class="m-0 font-weight-bold text-white">{{ $kecamatan->nama_kecamatan }}</h6>
                                    </a>
                                    <div id="Kecamatan{{ $kecamatan->id }}" class="card shadow mt-2 mb-4">
                                        <div class="collapse show" id="collapseCardExample{{ $kecamatan->id }}">
                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach ($kecamatan->desa as $desa)
                                                        <div class="col-lg-4 mt-2">
                                                            <a href="{{ route('desa.show', ['desa_id' => $desa->id]) }}"
                                                                style="text-decoration: none">
                                                                <h4 class="small font-weight-bold mt-1 text-dark">Desa
                                                                    {{ $desa->nama_desa }}
                                                                    <span class="float-right">{{ $desa->saksi->count() }}
                                                                        Orang</span>
                                                                </h4>
                                                            </a>
                                                            <div class="progress" style="height: 8px;">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                                                    role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: {{ $desa->saksi->count() }}%"></div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endcan

                    @can('korcam_dapil')
                        @foreach ($dapilDataUserCam as $dapil)
                            <div class="tab-pane fade show" id="DapilSiak{{ $dapil->id }}" role="tabpanel"
                                aria-labelledby="home-tab">
                                @foreach ($dapil->kecamatan as $kecamatan)
                                    @if ($kecamatan->id == Auth::user()->kecamatan_id)
                                        <a href="#Kecamatan{{ $kecamatan->id }}" class="d-block card-header"
                                            style="background-color: #F4CE14" data-toggle="collapse" role="button"
                                            aria-expanded="true" aria-controls="collapseCardExample"
                                            style="text-decoration: none">
                                            <h6 class="m-0 font-weight-bold text-white">{{ $kecamatan->nama_kecamatan }}</h6>
                                        </a>
                                        <div id="Kecamatan{{ $kecamatan->id }}" class="card shadow mt-2 mb-4">
                                            <div class="collapse show" id="collapseCardExample{{ $kecamatan->id }}">
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($kecamatan->desa as $desa)
                                                            <div class="col-lg-4 mt-2">
                                                                <a href="{{ route('desa.show', ['desa_id' => $desa->id]) }}"
                                                                    style="text-decoration: none">
                                                                    <h4 class="small font-weight-bold mt-1 text-dark">Desa
                                                                        {{ $desa->nama_desa }}
                                                                        <span class="float-right">{{ $desa->saksi->count() }}
                                                                            Orang</span>
                                                                    </h4>
                                                                </a>
                                                                <div class="progress" style="height: 8px;">
                                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                                                        role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                                        style="width: {{ $desa->saksi->count() }}%"></div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    @endcan

                    @can('kordes_dapil')
                        @foreach ($dapilDataUserDes as $dapil)
                            <div class="tab-pane fade show" id="DapilSiak{{ $dapil->id }}" role="tabpanel"
                                aria-labelledby="home-tab">
                                @foreach ($dapil->kecamatan as $kecamatan)
                                    @if ($kecamatan->id == Auth::user()->kecamatan_id)
                                        <a href="#Kecamatan{{ $kecamatan->id }}" class="d-block card-header"
                                            style="background-color: #F4CE14" data-toggle="collapse" role="button"
                                            aria-expanded="true" aria-controls="collapseCardExample"
                                            style="text-decoration: none">
                                            <h6 class="m-0 font-weight-bold text-white">{{ $kecamatan->nama_kecamatan }}</h6>
                                        </a>
                                        <div id="Kecamatan{{ $kecamatan->id }}" class="card shadow mt-2 mb-4">
                                            <div class="collapse show" id="collapseCardExample{{ $kecamatan->id }}">
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($kecamatan->desa as $desa)
                                                            @if ($desa->id == Auth::user()->desa_id)
                                                                <div class="col-lg-4 mt-2">
                                                                    <a href="{{ route('desa.show', ['desa_id' => $desa->id]) }}"
                                                                        style="text-decoration: none">
                                                                        <h4 class="small font-weight-bold mt-1 text-dark">Desa
                                                                            {{ $desa->nama_desa }}
                                                                            <span class="float-right">{{ $desa->saksi->count() }}
                                                                                Orang</span>
                                                                        </h4>
                                                                    </a>
                                                                    <div class="progress" style="height: 8px;">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                                                            role="progressbar" aria-valuemin="0"
                                                                            aria-valuemax="100"
                                                                            style="width: {{ $desa->saksi->count() }}%"></div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    @endcan
                </div>

            </div>
        </div>
        <!-- END: Content-->
    @endsection
@endcan

@can('caleg_content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- show error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Dashboard</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Aktifitas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="row justify-content-center mb-2">
                        <div class="col-sm-2 text-center">
                            <img src="{{ asset('assets/images/logo-golkar2.png') }}" class="img-thumbnail img-fluid"
                                style="height: 100px;">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-2 text-center">
                            <img src="{{ asset('assets/images/erlangga.jpg') }}" class="img-thumbnail img-fluid"
                                style="height: 100px;">
                        </div>
                        <div class="col-sm-2 text-center">
                            <img src="{{ asset('assets/images/syamsuar.jpg') }}" class="img-thumbnail img-fluid"
                                style="height: 100px;">
                        </div>
                        <div class="col-sm-2 text-center">
                            <img src="{{ asset('assets/images/indra.jpg') }}" class="img-thumbnail img-fluid"
                                style="height: 100px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="fullsaksi" role="tabpanel" aria-labelledby="home-tab">
                <div class="card shadow mb-4">
                    <a href="#Full" class="d-block card-header" style="background-color: #F4CE14"
                        data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-white">Full Data Saksi Caleg
                                {{ Auth::user()->caleg->nama_caleg }}</h6>
                            <img src="{{ Auth::user()->foto ? url(Storage::url(Auth::user()->foto)) : asset('assets/images/paslon.png') }}"
                                alt="Caleg Photo" class="img-thumbnail"
                                style="width: 50px; height: 50px; object-fit: cover;">
                        </div>
                    </a>
                    <div class="collapse show" id="Full">
                        <div class="card-body">
                            <h4 class="small font-weight-bold ">Full Data Saksi<span class="float-right">
                                    {{ $saksiCalegCount . ' Orang' }}</span></h4>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="1.000"
                                    style="width:{{ $saksiCalegCount }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="fullsaksi" role="tabpanel" aria-labelledby="home-tab">
                @foreach ($paket as $paket_item)
                    @if ($paket_item->id == 1)
                        <div class="card shadow mb-4">
                            <a href="#Full" class="d-block card-header" style="background-color: #F4CE14"
                                data-toggle="collapse" role="button" aria-expanded="true"
                                aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-white">Full Data Saksi
                                    {{ $paket_item->nama_paket }}
                                </h6>
                            </a>
                            <div class="collapse show" id="Full">
                                <div class="card-body">
                                    <h4 class="small font-weight-bold ">Full Data Saksi<span class="float-right">
                                            {{ $saksiPaket1 . ' Orang' }}</span></h4>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                            role="progressbar" aria-valuemin="0" aria-valuemax="1.000"
                                            style="width:{{ $saksiPaket1 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="tab-pane fade show" id="fullsaksi" role="tabpanel" aria-labelledby="home-tab">
                @foreach ($paket as $paket_item)
                    @if ($paket_item->id == 2)
                        <div class="card shadow mb-4">
                            <a href="#Full" class="d-block card-header" style="background-color: #F4CE14"
                                data-toggle="collapse" role="button" aria-expanded="true"
                                aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-white">Full Data Saksi
                                    {{ $paket_item->nama_paket }}
                                </h6>
                            </a>
                            <div class="collapse show" id="Full">
                                <div class="card-body">
                                    <h4 class="small font-weight-bold ">Full Data Saksi<span class="float-right">
                                            {{ $saksiPaket2 . ' Orang' }}</span></h4>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                            role="progressbar" aria-valuemin="0" aria-valuemax="1.000"
                                            style="width:{{ $saksiPaket2 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="content-body">
                <section id="table-home">
                    <!-- Zero configuration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Saksi List</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped table-bordered text-inputs-searching default-table">
                                                <thead>
                                                    <tr>
                                                        <th>Entri</th>
                                                        <th>Nama</th>
                                                        <th>NIK</th>
                                                        <th>Whatsapp</th>
                                                        <th>Foto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($saksiCaleg as $key => $saksi_item)
                                                        <tr data-entry-id="{{ $saksi_item->id }}">
                                                            <td>{{ $saksi_item->user->name ?? '' }}</td>
                                                            <td>{{ $saksi_item->nama ?? '' }}</td>
                                                            <td>{{ $saksi_item->nik ?? '' }}</td>
                                                            <td>
                                                                <a target="_blank"
                                                                    href="https://api.whatsapp.com/send?phone={{ $saksi_item->no_hp }}"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                                                                        </path>
                                                                    </svg></a>
                                                            </td>
                                                            <td><a data-fancybox="gallery"
                                                                    data-src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $saksi_item->foto }}"
                                                                    class="blue accent-4">Lihat</a></td>
                                                        </tr>
                                                    @empty
                                                        {{-- not found --}}
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
    <!-- END: Content-->
@endcan

@can('paket_content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- show error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Dashboard</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Aktifitas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="row justify-content-center mb-2">
                        <div class="col-sm-2 text-center">
                            <img src="{{ asset('assets/images/logo-golkar2.png') }}" class="img-thumbnail img-fluid"
                                style="height: 100px;">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-2 text-center">
                            <img src="{{ asset('assets/images/erlangga.jpg') }}" class="img-thumbnail img-fluid"
                                style="height: 100px;">
                        </div>
                        <div class="col-sm-2 text-center">
                            <img src="{{ asset('assets/images/syamsuar.jpg') }}" class="img-thumbnail img-fluid"
                                style="height: 100px;">
                        </div>
                        <div class="col-sm-2 text-center">
                            <img src="{{ asset('assets/images/indra.jpg') }}" class="img-thumbnail img-fluid"
                                style="height: 100px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="fullsaksi" role="tabpanel" aria-labelledby="home-tab">
                <div class="card shadow mb-4">
                    <a href="#Full" class="d-block card-header" style="background-color: #F4CE14"
                        data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-white">Full Data Saksi Caleg
                                {{ Auth::user()->paket->nama_paket }}</h6>
                            <img src="{{ Auth::user()->foto ? url(Storage::url(Auth::user()->foto)) : asset('assets/images/paslon.png') }}"
                                alt="Paket Photo" class="img-thumbnail"
                                style="width: 50px; height: 50px; object-fit: cover;">
                        </div>
                    </a>
                    <div class="collapse show" id="Full">
                        <div class="card-body">
                            <h4 class="small font-weight-bold ">Full Data Saksi<span class="float-right">
                                    {{ $saksiPaketCount . ' Orang' }}</span></h4>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="1.000"
                                    style="width:{{ $saksiPaketCount }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="fullsaksi" role="tabpanel" aria-labelledby="home-tab">
                @foreach ($caleg as $caleg_item)
                    <div class="card shadow mb-4">
                        <a href="#Full{{ $caleg_item->id }}" class="d-block card-header" style="background-color: #F4CE14"
                            data-toggle="collapse" role="button" aria-expanded="true"
                            aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-white">Full Data Saksi
                                {{ $caleg_item->nama_caleg }}
                            </h6>
                        </a>
                        <div class="collapse show" id="Full{{ $caleg_item->id }}">
                            <div class="card-body">
                                <?php
                                // Ambil data saksi berdasarkan caleg_id dan paket_id
                                $saksiData = \DB::table('saksi')
                                    ->join('paket_saksi', 'saksi.id', '=', 'paket_saksi.saksi_id')
                                    ->where('saksi.caleg_id', $caleg_item->id)
                                    ->where('paket_saksi.paket_id', Auth::user()->paket_id) // Ganti $paket_id dengan paket_id yang sesuai
                                    ->get();
                                $saksiCount = count($saksiData);
                                ?>
                                <h4 class="small font-weight-bold">Full Data Saksi<span class="float-right">
                                        {{ $saksiCount . ' Orang' }}</span></h4>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                        role="progressbar" aria-valuemin="0" aria-valuemax="1.000"
                                        style="width:{{ $saksiCount }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="content-body">
                <section id="table-home">
                    <!-- Zero configuration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Saksi List</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped table-bordered text-inputs-searching default-table">
                                                <thead>
                                                    <tr>
                                                        <th>Entri</th>
                                                        <th>Nama</th>
                                                        <th>NIK</th>
                                                        <th>Whatsapp</th>
                                                        <th>Foto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($saksiPaket as $key => $saksi_item)
                                                        <tr data-entry-id="{{ $saksi_item->id }}">
                                                            <td>{{ $saksi_item->user->name ?? '' }}</td>
                                                            <td>{{ $saksi_item->nama ?? '' }}</td>
                                                            <td>{{ $saksi_item->nik ?? '' }}</td>
                                                            <td>
                                                                <a target="_blank"
                                                                    href="https://api.whatsapp.com/send?phone={{ $saksi_item->no_hp }}"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                                                                        </path>
                                                                    </svg></a>
                                                            </td>
                                                            <td><a data-fancybox="gallery"
                                                                    data-src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $saksi_item->foto }}"
                                                                    class="blue accent-4">Lihat</a></td>
                                                        </tr>
                                                    @empty
                                                        {{-- not found --}}
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
    <!-- END: Content-->
@endcan

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">

    <style>
        .label {
            cursor: pointer;
        }

        .img-container img {
            max-width: 100%;
        }

        .img-thumbnail {
            width: 100px;
            height: auto;
        }

        @media (max-width: 500px) {
            .col-sm-2 {
                width: 30%;
            }

            .row.justify-content-center .col-sm-2 {
                margin: 0 auto;
            }
        }
    </style>
@endpush

@push('after-script')
    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

    <script>
        $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });

        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });

        $(document).ready(function() {
            $('[data-tooltip]').tooltip();
        });
    </script>
@endpush
