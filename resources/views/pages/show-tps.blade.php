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

            <h1>{{ 'Desa ' . $desa->nama_desa }}</h1>
            <h3>Jumlah TPS = {{ $totalTPS . ' TPS' }}</h3>

            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        @foreach ($desa->tps as $tps)
                            <li class="nav-item m-1" role="presentation">
                                <a class="nav-link btn-sm text-dark border-top border-right border-left"
                                    id="tps{{ $tps->id }}-tab" data-toggle="tab" href="#tps{{ $tps->id }}"
                                    role="tab" aria-controls="home" aria-selected="true"
                                    style="text-decoration: none">{{ $tps->nama_tps }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        @foreach ($desa->tps as $tps)
                            <div class="tab-pane fade" id="tps{{ $tps->id }}" role="tabpanel"
                                aria-labelledby="tps{{ $tps->id }}-tab">
                                <div class="card shadow mb-4">
                                    <div class="card-header" style="background-color: #F4CE14">
                                        <h6 class="m-0 font-weight-bold text-dark">
                                            {{ 'Data Saksi - ' . $tps->nama_tps }}
                                        </h6>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered text-inputs-searching default-table" id="datapensaksipertps" width="100%"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col"><small>No</small></th>
                                                                <th scope="col"><small>Entri</small></th>
                                                                <th scope="col"><small>Nama</small></th>
                                                                <th scope="col"><small>Nik</small></th>
                                                                <th scope="col"><small>Whatsapp</small></th>
                                                                <th scope="col"><small>Foto</small></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $i = 1; @endphp
                                                            @forelse ($saksi as $saksi_item)
                                                                @if ($saksi_item->tps_id == $tps->id)
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <small>{{ $i }}</small></th>
                                                                        <td><small>{{ $saksi_item->user->name }}</small>
                                                                        </td>
                                                                        <td><small>{{ $saksi_item->nama }}</small></td>
                                                                        <td><small>{{ $saksi_item->nik }}</small></td>
                                                                        <td>
                                                                            <a target="_blank"
                                                                                href="https://api.whatsapp.com/send?phone={{ $saksi_item->no_hp }}"
                                                                                class="badge badge-success">{{ $saksi_item->no_hp }}</a>
                                                                        </td>
                                                                        <td><a data-fancybox="gallery"
                                                                                data-src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $saksi_item->foto }}"
                                                                                class="text-info"
                                                                                style="cursor: pointer;">Lihat</a>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @empty
                                                                {{-- Not Found --}}
                                                            @endforelse
                                                            @php $i++; @endphp
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">
@endpush

@push('after-script')
    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fancybox
            Fancybox.bind('[data-fancybox="gallery"]', {
                infinite: false
            });

            // Pilih tab pertama
            var firstTab = document.querySelector('#myTab a.nav-link');
            if (firstTab) {
                firstTab.click(); // Klik tab pertama
            }
        });
        // Fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });
    </script>
@endpush
