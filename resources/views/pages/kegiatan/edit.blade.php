@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Saksi')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Saksi</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Saksi</li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- forms --}}
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                anda menekan tombol submit.</p>
                                        </div>
                                        <form class="form form-horizontal"
                                            action="{{ route('kegiatan.update', [$kegiatan->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Saksi</h4>

                                                <div class="form-group row">
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="caleg_id"
                                                        value="{{ Auth::user()->caleg->id }}">
                                                    <input type="hidden" name="kecamatan_id"
                                                        value="{{ Auth::user()->kecamatan->id }}">
                                                    <input type="hidden" name="desa_id"
                                                        value="{{ Auth::user()->desa->id }}">
                                                    <label class="col-md-3 label-control" for="nama_kegiatan">Nama
                                                        Kegiatan<code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                                            class="form-control" placeholder="example jhon doe"
                                                            value="{{ old('nama_kegiatan', isset($kegiatan) ? $kegiatan->nama_kegiatan : '') }}"
                                                            autocomplete="off" required>

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
                                                            class="form-control"
                                                            value="{{ old('tanggal', isset($kegiatan) ? $kegiatan->tanggal : '') }}"
                                                            autocomplete="off">

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
                                                            class="form-control"
                                                            value="{{ old('waktu', isset($kegiatan) ? $kegiatan->waktu : '') }}"
                                                            autocomplete="off">

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
                                                            class="form-control"
                                                            value="{{ old('lokasi', isset($kegiatan) ? $kegiatan->lokasi : '') }}"
                                                            autocomplete="off">

                                                        @if ($errors->has('lokasi'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('lokasi') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="keterangan">Keterangan
                                                        <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="keterangan" name="keterangan"
                                                            class="form-control"
                                                            value="{{ old('keterangan', isset($kegiatan) ? $kegiatan->keterangan : '') }}"
                                                            autocomplete="off">

                                                        @if ($errors->has('keterangan'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('keterangan') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions text-right">
                                                <a href="{{ route('kegiatan.index') }}" style="width:120px;"
                                                    class="btn bg-blue-grey text-white mr-1"
                                                    onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                    <i class="ft-x"></i> Batal
                                                </a>
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

        </div>
    </div>
    <!-- END: Content-->

@endsection


@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script>
        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
