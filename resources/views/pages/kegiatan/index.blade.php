@extends('layouts.app')

{{-- set title --}}
@section('title', 'Kegiatan')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
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
                    <h3 class="content-header-title mb-0 d-inline-block">Kegiatan</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Kegiatan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('kegiatan_create')
                <div class="content-body">
                    <section id="add-home">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        <a data-action="collapse">
                                            <h4 class="card-title text-white">Tambah Data</h4>
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="card-content collapse hide">
                                        <div class="card-body card-dashboard">

                                            <form class="form form-horizontal" action="{{ route('kegiatan.store') }}"
                                                method="POST" enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                            anda menekan tombol submit.</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="nama_kegiatan">Nama Kegiatan
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="caleg_id"
                                                                value="{{ Auth::user()->caleg->id }}">
                                                            <input type="hidden" name="kecamatan_id"
                                                                value="{{ Auth::user()->kecamatan->id }}">
                                                            <input type="hidden" name="desa_id"
                                                                value="{{ Auth::user()->desa->id }}">
                                                            <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                                                class="form-control" placeholder="Nama Kegiatan"
                                                                value="{{ old('nama_kegiatan') }}" autocomplete="off" required>

                                                            @if ($errors->has('nama_kegiatan'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nama_kegiatan') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="tanggal">Tanggal Kegiatan
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="date" id="tanggal" name="tanggal"
                                                                class="form-control" placeholder="Tanggal Kegiatan"
                                                                value="{{ old('tanggal') }}" autocomplete="off" required>

                                                            @if ($errors->has('tanggal'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tanggal') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="waktu">Waktu Kegiatan
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="time" id="waktu" name="waktu"
                                                                class="form-control" placeholder="Waktu Kegiatan"
                                                                value="{{ old('waktu') }}" autocomplete="off" required>

                                                            @if ($errors->has('waktu'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('waktu') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="lokasi">Lokasi Kegiatan
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="lokasi" name="lokasi"
                                                                class="form-control" placeholder="Lokasi Kegiatan"
                                                                value="{{ old('lokasi') }}" autocomplete="off" required>

                                                            @if ($errors->has('lokasi'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('lokasi') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="keterangan1">Keterangan
                                                            <code style="color:green;">optional</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="keterangan1" name="keterangan1"
                                                                class="form-control" placeholder="Keterangan"
                                                                value="{{ old('keterangan1') }}" autocomplete="off">

                                                            @if ($errors->has('keterangan1'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('keterangan1') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-actions text-right">
                                                    <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                        onclick="return confirm('Are you sure want to save this data ?')">
                                                        <i class="la la-check-square-o"></i> Submit
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            @endcan

            {{-- table card --}}
            @can('korkab_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Kegiatan List</h4>
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
                                                            <th>Pengaju </th>
                                                            <th>Nama Kegiatan</th>
                                                            <th>Tanggal </th>
                                                            <th>Lokasi</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($kegiatan as $key => $kegiatan_item)
                                                            <tr data-entry-id="{{ $kegiatan_item->id }}">
                                                                <td>{{ $kegiatan_item->user->name ?? '' }}</td>
                                                                <td>{{ $kegiatan_item->nama_kegiatan ?? '' }}</td>
                                                                <td>{{ $kegiatan_item->tanggal ?? '' }}</td>
                                                                <td>{{ $kegiatan_item->lokasi ?? '' }}</td>
                                                                <td>
                                                                    @if ($kegiatan_item->status == 'setuju')
                                                                        <span
                                                                            class="badge badge-success">{{ 'Disetujui' }}</span>
                                                                    @elseif($kegiatan_item->status == 'tunggu')
                                                                        <span
                                                                            class="badge badge-warning">{{ 'Menunggu' }}</span>
                                                                    @elseif($kegiatan_item->status == 'tunda')
                                                                        <span
                                                                            class="badge badge-danger">{{ 'Ditunda' }}</span>
                                                                    @else
                                                                        <span>{{ 'N/A' }}</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @can('kegiatan_show')
                                                                        <a href="#mymodal"
                                                                            data-remote="{{ route('kegiatan.show', $kegiatan_item->id) }}"
                                                                            data-toggle="modal" data-target="#mymodal"
                                                                            data-title="Kegiatan Detail" class="badge badge-info"
                                                                            data-tooltip="Tooltip on top" title="Lihat"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z">
                                                                                </path>
                                                                                <path
                                                                                    d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z">
                                                                                </path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @if ($kegiatan_item->status == 'tunggu')
                                                                        @can('kegiatan_edit')
                                                                            <a href="#" data-toggle="modal"
                                                                                data-target="#setujuModal{{ $kegiatan_item->id }}"
                                                                                class="badge badge-success"
                                                                                data-tooltip="Tooltip on top" title="Setuju"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                    <path
                                                                                        d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z">
                                                                                    </path>
                                                                                </svg></a>
                                                                        @endcan
                                                                        @can('kegiatan_edit')
                                                                            <a href="#" data-toggle="modal"
                                                                                data-target="#tundaModal{{ $kegiatan_item->id }}"
                                                                                class="badge badge-danger"
                                                                                data-tooltip="Tooltip on top" title="Tunda"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                    <path
                                                                                        d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                                                                    </path>
                                                                                </svg></a>
                                                                        @endcan
                                                                    @endif
                                                                </td>
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
            @endcan

            @can('kegiatan_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Kegiatan List</h4>
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
                                                            <th>Pengaju </th>
                                                            <th>Nama Kegiatan</th>
                                                            <th>Tanggal </th>
                                                            <th>Lokasi</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($kegiatanUser as $key => $kegiatan_item)
                                                            <tr data-entry-id="{{ $kegiatan_item->id }}">
                                                                <td>{{ $kegiatan_item->user->name ?? '' }}</td>
                                                                <td>{{ $kegiatan_item->nama_kegiatan ?? '' }}</td>
                                                                <td>{{ $kegiatan_item->tanggal ?? '' }}</td>
                                                                <td>{{ $kegiatan_item->lokasi ?? '' }}</td>
                                                                <td>
                                                                    @if ($kegiatan_item->status == 'setuju')
                                                                        <span
                                                                            class="badge badge-success">{{ 'Disetujui' }}</span>
                                                                    @elseif($kegiatan_item->status == 'tunggu')
                                                                        <span
                                                                            class="badge badge-warning">{{ 'Menunggu' }}</span>
                                                                    @elseif($kegiatan_item->status == 'tunda')
                                                                        <span
                                                                            class="badge badge-danger">{{ 'Ditunda' }}</span>
                                                                    @else
                                                                        <span>{{ 'N/A' }}</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @can('kegiatan_show')
                                                                        <a href="#mymodal"
                                                                            data-remote="{{ route('kegiatan.show', $kegiatan_item->id) }}"
                                                                            data-toggle="modal" data-target="#mymodal"
                                                                            data-title="Kegiatan Detail" class="badge badge-info"
                                                                            data-tooltip="Tooltip on top" title="Lihat"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z">
                                                                                </path>
                                                                                <path
                                                                                    d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z">
                                                                                </path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @can('kegiatan_edit')
                                                                        <a href="{{ route('kegiatan.edit', $kegiatan_item->id) }}"
                                                                            class="badge badge-warning"
                                                                            data-tooltip="Tooltip on top" title="Edit"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z">
                                                                                </path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @can('kegiatan_delete')
                                                                        <a href="#" class="badge badge-danger"
                                                                            data-tooltip="Tooltip on top" title="Hapus"
                                                                            onclick="deleteKegiatan({{ $kegiatan_item->id }})"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                                                </path>
                                                                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                                            </svg></a>
                                                                    @endcan
                                                                </td>
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
            @endcan

        </div>
    </div>
    <!-- END: Content-->

    @foreach ($kegiatan as $key => $kegiatan_item)
        <!-- Modal for Tunda -->
        <div class="modal fade" id="tundaModal{{ $kegiatan_item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="tundaModal{{ $kegiatan_item->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tundaModal{{ $kegiatan_item->id }}Label">Keterangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kegiatan.tunda', $kegiatan_item->id) }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="keterangan2">Keterangan Ditunda:</label>
                                <input type="text" name="keterangan2" class="form-control" id="keterangan2"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-danger">Tunda</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($kegiatan as $key => $kegiatan_item)
        <!-- Modal for Terima -->
        <div class="modal fade" id="setujuModal{{ $kegiatan_item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="terimaModal{{ $kegiatan_item->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="terimaModal{{ $kegiatan_item->id }}Label">Terima Kegiatan
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah kamu yakin ingin mererima Kegiatan ini?</p>
                        <form action="{{ route('kegiatan.terima', $kegiatan_item->id) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Terima</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">

    <style>
        .label {
            cursor: pointer;
        }

        .img-container img {
            max-width: 100%;
        }
    </style>
@endpush

@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#mymodal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });

            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })

            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
        });

        $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });

        $(function() {
            $(":input").inputmask();
        });

        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });

        function deleteKegiatan(kegiatanId) {
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                var form = document.createElement('form');
                form.action = '{{ route('kegiatan.destroy', '__id') }}'.replace('__id', kegiatanId);
                form.method = 'POST';
                form.style.display = 'none';

                var tokenInput = document.createElement('input');
                tokenInput.type = 'hidden';
                tokenInput.name = '_token';
                tokenInput.value = '{{ csrf_token() }}';

                var methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';

                form.appendChild(tokenInput);
                form.appendChild(methodInput);
                document.body.appendChild(form);

                form.submit();
            }
        }

        $(document).ready(function() {
            $('[data-tooltip]').tooltip();
        });
    </script>

    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa spin"></i>
                </div>
            </div>
        </div>
    </div>
@endpush
