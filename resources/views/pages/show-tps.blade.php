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
                                                    <table
                                                        class="table table-striped table-bordered text-inputs-searching default-table"
                                                        id="datapensaksipertps" width="100%" cellspacing="0">
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
                                                                            <small>{{ $i }}</small>
                                                                        </th>
                                                                        <td><small>{{ $saksi_item->user->name }}</small>
                                                                        </td>
                                                                        <td><small>{{ $saksi_item->nama }}</small></td>
                                                                        <td><small>{{ $saksi_item->nik }}</small></td>
                                                                        <td>
                                                                            <a target="_blank"
                                                                                href="https://api.whatsapp.com/send?phone={{ $saksi_item->no_hp }}"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                                                                                    </path>
                                                                                </svg></a>
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
