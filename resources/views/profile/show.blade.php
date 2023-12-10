@extends('layouts.app')

@section('title', 'Dashboard')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Profile</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">My Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h1>My Profile</h1>
                    <h3>Email: {{ $user->email }}</h3>
                    <h3>Name: {{ $user->name }}</h3>
                    <h3>Kecamatan: {{ $user->kecamatan->nama_kecamatan }}</h3>
                    <h3>Desa: {{ $user->desa->nama_desa ?? 'Belum Memiliki Desa' }}</h3>
                    <h3>TPS: {{ $user->tps->nama_tps ?? 'Belum Memiliki TPS'}}</h3>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Content-->
@endsection
