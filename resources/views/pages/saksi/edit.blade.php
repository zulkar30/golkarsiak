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

                                        @can('korkab_form')
                                            <form class="form form-horizontal"
                                                action="{{ route('saksi.update', [$saksi->id]) }}" method="POST"
                                                enctype="multipart/form-data">

                                                @method('PUT')
                                                @csrf

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="fa fa-edit"></i> Form Saksi</h4>

                                                    <div class="form-group row">
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <label class="col-md-3 label-control" for="nama">Nama <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="nama" name="nama"
                                                                class="form-control" placeholder="example jhon doe"
                                                                value="{{ old('nama', isset($saksi) ? $saksi->nama : '') }}"
                                                                autocomplete="off" required>

                                                            @if ($errors->has('nama'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nama') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="nik">NIK <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="nik" name="nik"
                                                                class="form-control" placeholder="example 1403xxxxxxxxxxxxxxx"
                                                                value="{{ old('nik', isset($saksi) ? $saksi->nik : '') }}"
                                                                autocomplete="off" readonly>

                                                            @if ($errors->has('nik'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nik') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Jenis Kelamin <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="jenis_kelamin" id="jenis_kelamin"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('jenis_kelamin', isset($saksi) ? $saksi->jenis_kelamin : '') }}"
                                                                    disabled selected>
                                                                    @if ($saksi->jenis_kelamin == 'laki-laki')
                                                                        <span>Laki-laki</span>
                                                                    @else
                                                                        <span>Perempuan</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Laki-laki</option>
                                                                <option value="2">Perempuan</option>
                                                            </select>

                                                            @if ($errors->has('jenis_kelamin'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('jenis_kelamin') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="no_hp">Whatsapp <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">62</span>
                                                                </div>
                                                                <input type="text" id="no_hp" name="no_hp"
                                                                    placeholder="Nomor Aktif" class="form-control"
                                                                    value="{{ old('no_hp', isset($saksi) ? substr($saksi->no_hp, 2) : '') }}"
                                                                    autocomplete="off">
                                                            </div>

                                                            @if ($errors->has('no_hp'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_hp') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="umur">Umur
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="umur" name="umur"
                                                                class="form-control"
                                                                value="{{ old('umur', isset($saksi) ? $saksi->umur : '') . ' Tahun' }}"
                                                                autocomplete="off" required>

                                                            @if ($errors->has('umur'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('umur') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('kecamatan_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Kecamatan <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="kecamatan_id" id="kecamatan_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('kecamatan_id', isset($saksi) ? $saksi->kecamatan_id : '') }}"
                                                                    disabled selected>{{ $saksi->kecamatan->nama_kecamatan }}
                                                                </option>
                                                                @foreach ($kecamatan as $key => $kecamatan_item)
                                                                    <option value="{{ $kecamatan_item->id }}">
                                                                        {{ $kecamatan_item->nama_kecamatan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('kecamatan_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('kecamatan_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('desa_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Desa <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="desa_id" id="desa_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('desa_id', isset($saksi) ? $saksi->desa_id : '') }}"
                                                                    disabled selected>{{ $saksi->desa->nama_desa }}
                                                                </option>
                                                                @foreach ($desa as $key => $desa_item)
                                                                    <option value="{{ $desa_item->id }}">
                                                                        {{ $desa_item->nama_desa }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('desa_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('desa_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('tps_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">TPS <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="tps_id" id="tps_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('tps_id', isset($saksi) ? $saksi->tps_id : '') }}"
                                                                    disabled selected>{{ $saksi->tps->nama_tps }}
                                                                </option>
                                                                @foreach ($tps as $key => $tps_item)
                                                                    <option value="{{ $tps_item->id }}">
                                                                        {{ $tps_item->nama_tps }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('tps_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tps_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Status <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="status" id="status"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('status', isset($saksi) ? $saksi->status : '') }}"
                                                                    disabled selected>
                                                                    @if ($saksi->status == 'active')
                                                                        <span>Aktif</span>
                                                                    @else
                                                                        <span>Pasif</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Aktif</option>
                                                                <option value="2">Pasif</option>
                                                            </select>

                                                            @if ($errors->has('status'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('status') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('caleg_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Caleg <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="caleg_id" id="caleg_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('caleg_id', isset($saksi) ? $saksi->caleg_id : '') }}"
                                                                    disabled selected>{{ $saksi->caleg->nama_caleg }}
                                                                </option>
                                                                @foreach ($caleg as $key => $caleg_item)
                                                                    <option value="{{ $caleg_item->id }}">
                                                                        {{ $caleg_item->nama_caleg }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('caleg_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('caleg_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Paket</label>
                                                        <div class="col-md-9 mx-auto">
                                                            @foreach ($paketData as $paket)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="paket[]" value="{{ $paket->id }}"
                                                                        {{ in_array($paket->id, $saksi->paket->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <label
                                                                        class="form-check-label">{{ $paket->nama_paket }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="foto">Foto <code
                                                                style="color:green;">opsional</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                    accept="image/png, image/svg, image/jpeg"
                                                                    class="custom-file-input" id="foto" name="foto">
                                                                <label class="custom-file-label" for="foto"
                                                                    aria-describedby="foto">Pilih File</label>
                                                            </div>

                                                            <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                    mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                    JPEG, SVG, PNG & Maksimal ukuran file hanya 10
                                                                    MegaBytes</small></p>

                                                            @if ($errors->has('foto'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('foto') }}</p>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-actions text-right">
                                                    <a href="{{ route('saksi.index') }}" style="width:120px;"
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
                                        @endcan

                                        @can('korcam_form')
                                            <form class="form form-horizontal"
                                                action="{{ route('saksi.update', [$saksi->id]) }}" method="POST"
                                                enctype="multipart/form-data">

                                                @method('PUT')
                                                @csrf

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="fa fa-edit"></i> Form Saksi</h4>

                                                    <div class="form-group row">
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <label class="col-md-3 label-control" for="nama">Nama <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="nama" name="nama"
                                                                class="form-control" placeholder="example jhon doe"
                                                                value="{{ old('nama', isset($saksi) ? $saksi->nama : '') }}"
                                                                autocomplete="off" required>

                                                            @if ($errors->has('nama'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nama') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="nik">NIK <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="nik" name="nik"
                                                                class="form-control" placeholder="example 1403xxxxxxxxxxxxxxx"
                                                                value="{{ old('nik', isset($saksi) ? $saksi->nik : '') }}"
                                                                autocomplete="off" readonly>

                                                            @if ($errors->has('nik'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nik') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Jenis Kelamin <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="jenis_kelamin" id="jenis_kelamin"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('jenis_kelamin', isset($saksi) ? $saksi->jenis_kelamin : '') }}"
                                                                    disabled selected>
                                                                    @if ($saksi->jenis_kelamin == 'laki-laki')
                                                                        <span>Laki-laki</span>
                                                                    @else
                                                                        <span>Perempuan</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Laki-laki</option>
                                                                <option value="2">Perempuan</option>
                                                            </select>

                                                            @if ($errors->has('jenis_kelamin'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('jenis_kelamin') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="no_hp">Whatsapp <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">62</span>
                                                                </div>
                                                                <input type="text" id="no_hp" name="no_hp"
                                                                    placeholder="Nomor Aktif" class="form-control"
                                                                    value="{{ old('no_hp', isset($saksi) ? substr($saksi->no_hp, 2) : '') }}"
                                                                    autocomplete="off">
                                                            </div>

                                                            @if ($errors->has('no_hp'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_hp') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="umur">Umur
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="umur" name="umur"
                                                                class="form-control"
                                                                value="{{ old('umur', isset($saksi) ? $saksi->umur : '') . ' Tahun' }}"
                                                                autocomplete="off" required>

                                                            @if ($errors->has('umur'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('umur') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('kecamatan_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Kecamatan <code
                                                                style="color:red;">required</code></label>
                                                        <input type="hidden" name="kecamatan_id"
                                                            value="{{ old('kecamatan_id', isset($saksi) ? $saksi->kecamatan_id : '') }}">
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="kecamatan_id" id="kecamatan_id"
                                                                class="form-control select2" disabled>
                                                                <option
                                                                    value="{{ old('kecamatan_id', isset($saksi) ? $saksi->kecamatan_id : '') }}"
                                                                    disabled selected>{{ $saksi->kecamatan->nama_kecamatan }}
                                                                </option>
                                                                @foreach ($kecamatan as $key => $kecamatan_item)
                                                                    <option value="{{ $kecamatan_item->id }}">
                                                                        {{ $kecamatan_item->nama_kecamatan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('kecamatan_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('kecamatan_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('desa_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Desa <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="desa_id" id="desa_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('desa_id', isset($saksi) ? $saksi->desa_id : '') }}"
                                                                    disabled selected>{{ $saksi->desa->nama_desa }}
                                                                </option>
                                                                @foreach ($desa as $key => $desa_item)
                                                                    <option value="{{ $desa_item->id }}">
                                                                        {{ $desa_item->nama_desa }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('desa_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('desa_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('tps_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">TPS <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="tps_id" id="tps_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('tps_id', isset($saksi) ? $saksi->tps_id : '') }}"
                                                                    disabled selected>{{ $saksi->tps->nama_tps }}
                                                                </option>
                                                                @foreach ($tps as $key => $tps_item)
                                                                    <option value="{{ $tps_item->id }}">
                                                                        {{ $tps_item->nama_tps }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('tps_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tps_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Status <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="status" id="status"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('status', isset($saksi) ? $saksi->status : '') }}"
                                                                    disabled selected>
                                                                    @if ($saksi->status == 'active')
                                                                        <span>Aktif</span>
                                                                    @else
                                                                        <span>Pasif</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Aktif</option>
                                                                <option value="2">Pasif</option>
                                                            </select>

                                                            @if ($errors->has('status'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('status') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('caleg_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Caleg <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="caleg_id" id="caleg_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('caleg_id', isset($saksi) ? $saksi->caleg_id : '') }}"
                                                                    disabled selected>{{ $saksi->caleg->nama_caleg }}
                                                                </option>
                                                                @foreach ($caleg as $key => $caleg_item)
                                                                    <option value="{{ $caleg_item->id }}">
                                                                        {{ $caleg_item->nama_caleg }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('caleg_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('caleg_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Paket</label>
                                                        <div class="col-md-9 mx-auto">
                                                            @foreach ($paketData as $paket)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="paket[]" value="{{ $paket->id }}"
                                                                        {{ in_array($paket->id, $saksi->paket->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <label
                                                                        class="form-check-label">{{ $paket->nama_paket }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="foto">Foto <code
                                                                style="color:green;">opsional</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                    accept="image/png, image/svg, image/jpeg"
                                                                    class="custom-file-input" id="foto" name="foto">
                                                                <label class="custom-file-label" for="foto"
                                                                    aria-describedby="foto">Pilih File</label>
                                                            </div>

                                                            <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                    mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                    JPEG, SVG, PNG & Maksimal ukuran file hanya 10
                                                                    MegaBytes</small></p>

                                                            @if ($errors->has('foto'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('foto') }}</p>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-actions text-right">
                                                    <a href="{{ route('saksi.index') }}" style="width:120px;"
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
                                        @endcan

                                        @can('kordes_form')
                                            <form class="form form-horizontal"
                                                action="{{ route('saksi.update', [$saksi->id]) }}" method="POST"
                                                enctype="multipart/form-data">

                                                @method('PUT')
                                                @csrf

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="fa fa-edit"></i> Form Saksi</h4>

                                                    <div class="form-group row">
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <label class="col-md-3 label-control" for="nama">Nama <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="nama" name="nama"
                                                                class="form-control" placeholder="example jhon doe"
                                                                value="{{ old('nama', isset($saksi) ? $saksi->nama : '') }}"
                                                                autocomplete="off" required>

                                                            @if ($errors->has('nama'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nama') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="nik">NIK <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="nik" name="nik"
                                                                class="form-control" placeholder="example 1403xxxxxxxxxxxxxxx"
                                                                value="{{ old('nik', isset($saksi) ? $saksi->nik : '') }}"
                                                                autocomplete="off" readonly>

                                                            @if ($errors->has('nik'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nik') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Jenis Kelamin <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="jenis_kelamin" id="jenis_kelamin"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('jenis_kelamin', isset($saksi) ? $saksi->jenis_kelamin : '') }}"
                                                                    disabled selected>
                                                                    @if ($saksi->jenis_kelamin == 'laki-laki')
                                                                        <span>Laki-laki</span>
                                                                    @else
                                                                        <span>Perempuan</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Laki-laki</option>
                                                                <option value="2">Perempuan</option>
                                                            </select>

                                                            @if ($errors->has('jenis_kelamin'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('jenis_kelamin') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="no_hp">Whatsapp <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">62</span>
                                                                </div>
                                                                <input type="text" id="no_hp" name="no_hp"
                                                                    placeholder="Nomor Aktif" class="form-control"
                                                                    value="{{ old('no_hp', isset($saksi) ? substr($saksi->no_hp, 2) : '') }}"
                                                                    autocomplete="off">
                                                            </div>

                                                            @if ($errors->has('no_hp'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_hp') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="umur">Umur
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="umur" name="umur"
                                                                class="form-control"
                                                                value="{{ old('umur', isset($saksi) ? $saksi->umur : '') . ' Tahun' }}"
                                                                autocomplete="off" required>

                                                            @if ($errors->has('umur'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('umur') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('kecamatan_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Kecamatan <code
                                                                style="color:red;">required</code></label>
                                                        <input type="hidden" name="kecamatan_id"
                                                            value="{{ old('kecamatan_id', isset($saksi) ? $saksi->kecamatan_id : '') }}">
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="kecamatan_id" id="kecamatan_id"
                                                                class="form-control select2" disabled>
                                                                <option
                                                                    value="{{ old('kecamatan_id', isset($saksi) ? $saksi->kecamatan_id : '') }}"
                                                                    disabled selected>{{ $saksi->kecamatan->nama_kecamatan }}
                                                                </option>
                                                                @foreach ($kecamatan as $key => $kecamatan_item)
                                                                    <option value="{{ $kecamatan_item->id }}">
                                                                        {{ $kecamatan_item->nama_kecamatan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('kecamatan_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('kecamatan_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('desa_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Desa <code
                                                                style="color:red;">required</code></label>
                                                        <input type="hidden" name="desa_id"
                                                            value="{{ old('desa_id', isset($saksi) ? $saksi->desa_id : '') }}">
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="desa_id" id="desa_id"
                                                                class="form-control select2" disabled>
                                                                <option
                                                                    value="{{ old('desa_id', isset($saksi) ? $saksi->desa_id : '') }}"
                                                                    disabled selected>{{ $saksi->desa->nama_desa }}
                                                                </option>
                                                                @foreach ($desa as $key => $desa_item)
                                                                    <option value="{{ $desa_item->id }}">
                                                                        {{ $desa_item->nama_desa }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('desa_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('desa_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('tps_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">TPS <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="tps_id" id="tps_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('tps_id', isset($saksi) ? $saksi->tps_id : '') }}"
                                                                    disabled selected>{{ $saksi->tps->nama_tps }}
                                                                </option>
                                                                @foreach ($tps as $key => $tps_item)
                                                                    <option value="{{ $tps_item->id }}">
                                                                        {{ $tps_item->nama_tps }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('tps_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tps_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Status <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="status" id="status"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('status', isset($saksi) ? $saksi->status : '') }}"
                                                                    disabled selected>
                                                                    @if ($saksi->status == 'active')
                                                                        <span>Aktif</span>
                                                                    @else
                                                                        <span>Pasif</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Aktif</option>
                                                                <option value="2">Pasif</option>
                                                            </select>

                                                            @if ($errors->has('status'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('status') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('caleg_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Caleg <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="caleg_id" id="caleg_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('caleg_id', isset($saksi) ? $saksi->caleg_id : '') }}"
                                                                    disabled selected>{{ $saksi->caleg->nama_caleg }}
                                                                </option>
                                                                @foreach ($caleg as $key => $caleg_item)
                                                                    <option value="{{ $caleg_item->id }}">
                                                                        {{ $caleg_item->nama_caleg }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('caleg_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('caleg_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Paket</label>
                                                        <div class="col-md-9 mx-auto">
                                                            @foreach ($paketData as $paket)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="paket[]" value="{{ $paket->id }}"
                                                                        {{ in_array($paket->id, $saksi->paket->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <label
                                                                        class="form-check-label">{{ $paket->nama_paket }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="foto">Foto <code
                                                                style="color:green;">opsional</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                    accept="image/png, image/svg, image/jpeg"
                                                                    class="custom-file-input" id="foto" name="foto">
                                                                <label class="custom-file-label" for="foto"
                                                                    aria-describedby="foto">Pilih File</label>
                                                            </div>

                                                            <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                    mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                    JPEG, SVG, PNG & Maksimal ukuran file hanya 10
                                                                    MegaBytes</small></p>

                                                            @if ($errors->has('foto'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('foto') }}</p>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-actions text-right">
                                                    <a href="{{ route('saksi.index') }}" style="width:120px;"
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
                                        @endcan

                                        @can('kortps_form')
                                            <form class="form form-horizontal"
                                                action="{{ route('saksi.update', [$saksi->id]) }}" method="POST"
                                                enctype="multipart/form-data">

                                                @method('PUT')
                                                @csrf

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="fa fa-edit"></i> Form Saksi</h4>

                                                    <div class="form-group row">
                                                        <input type="hidden" name="user_id"
                                                            value="{{ Auth::user()->id }}">
                                                        <label class="col-md-3 label-control" for="nama">Nama <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="nama" name="nama"
                                                                class="form-control" placeholder="example jhon doe"
                                                                value="{{ old('nama', isset($saksi) ? $saksi->nama : '') }}"
                                                                autocomplete="off" required>

                                                            @if ($errors->has('nama'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nama') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="nik">NIK <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="nik" name="nik"
                                                                class="form-control" placeholder="example 1403xxxxxxxxxxxxxxx"
                                                                value="{{ old('nik', isset($saksi) ? $saksi->nik : '') }}"
                                                                autocomplete="off" readonly>

                                                            @if ($errors->has('nik'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('nik') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Jenis Kelamin <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="jenis_kelamin" id="jenis_kelamin"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('jenis_kelamin', isset($saksi) ? $saksi->jenis_kelamin : '') }}"
                                                                    disabled selected>
                                                                    @if ($saksi->jenis_kelamin == 'laki-laki')
                                                                        <span>Laki-laki</span>
                                                                    @else
                                                                        <span>Perempuan</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Laki-laki</option>
                                                                <option value="2">Perempuan</option>
                                                            </select>

                                                            @if ($errors->has('jenis_kelamin'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('jenis_kelamin') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="no_hp">Whatsapp <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">62</span>
                                                                </div>
                                                                <input type="text" id="no_hp" name="no_hp"
                                                                    placeholder="Nomor Aktif" class="form-control"
                                                                    value="{{ old('no_hp', isset($saksi) ? substr($saksi->no_hp, 2) : '') }}"
                                                                    autocomplete="off">
                                                            </div>

                                                            @if ($errors->has('no_hp'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_hp') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="umur">Umur
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="umur" name="umur"
                                                                class="form-control"
                                                                value="{{ old('umur', isset($saksi) ? $saksi->umur : '') . ' Tahun' }}"
                                                                autocomplete="off" required>

                                                            @if ($errors->has('umur'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('umur') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('kecamatan_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Kecamatan <code
                                                                style="color:red;">required</code></label>
                                                        <input type="hidden" name="kecamatan_id"
                                                            value="{{ old('kecamatan_id', isset($saksi) ? $saksi->kecamatan_id : '') }}">
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="kecamatan_id" id="kecamatan_id"
                                                                class="form-control select2" disabled>
                                                                <option
                                                                    value="{{ old('kecamatan_id', isset($saksi) ? $saksi->kecamatan_id : '') }}"
                                                                    disabled selected>{{ $saksi->kecamatan->nama_kecamatan }}
                                                                </option>
                                                                @foreach ($kecamatan as $key => $kecamatan_item)
                                                                    <option value="{{ $kecamatan_item->id }}">
                                                                        {{ $kecamatan_item->nama_kecamatan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('kecamatan_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('kecamatan_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('desa_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Desa <code
                                                                style="color:red;">required</code></label>
                                                        <input type="hidden" name="desa_id"
                                                            value="{{ old('desa_id', isset($saksi) ? $saksi->desa_id : '') }}">
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="desa_id" id="desa_id"
                                                                class="form-control select2" disabled>
                                                                <option
                                                                    value="{{ old('desa_id', isset($saksi) ? $saksi->desa_id : '') }}"
                                                                    disabled selected>{{ $saksi->desa->nama_desa }}
                                                                </option>
                                                                @foreach ($desa as $key => $desa_item)
                                                                    <option value="{{ $desa_item->id }}">
                                                                        {{ $desa_item->nama_desa }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('desa_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('desa_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('tps_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">TPS <code
                                                                style="color:red;">required</code></label>
                                                        <input type="hidden" name="tps_id"
                                                            value="{{ old('tps_id', isset($saksi) ? $saksi->tps_id : '') }}">
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="tps_id" id="tps_id"
                                                                class="form-control select2" disabled>
                                                                <option
                                                                    value="{{ old('tps_id', isset($saksi) ? $saksi->tps_id : '') }}"
                                                                    disabled selected>{{ $saksi->tps->nama_tps }}
                                                                </option>
                                                                @foreach ($tps as $key => $tps_item)
                                                                    <option value="{{ $tps_item->id }}">
                                                                        {{ $tps_item->nama_tps }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('tps_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tps_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Status <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="status" id="status"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('status', isset($saksi) ? $saksi->status : '') }}"
                                                                    disabled selected>
                                                                    @if ($saksi->status == 'active')
                                                                        <span>Aktif</span>
                                                                    @else
                                                                        <span>Pasif</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Aktif</option>
                                                                <option value="2">Pasif</option>
                                                            </select>

                                                            @if ($errors->has('status'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('status') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('caleg_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Caleg <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="caleg_id" id="caleg_id"
                                                                class="form-control select2" required>
                                                                <option
                                                                    value="{{ old('caleg_id', isset($saksi) ? $saksi->caleg_id : '') }}"
                                                                    disabled selected>{{ $saksi->caleg->nama_caleg }}
                                                                </option>
                                                                @foreach ($caleg as $key => $caleg_item)
                                                                    <option value="{{ $caleg_item->id }}">
                                                                        {{ $caleg_item->nama_caleg }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('caleg_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('caleg_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Paket</label>
                                                        <div class="col-md-9 mx-auto">
                                                            @foreach ($paketData as $paket)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="paket[]" value="{{ $paket->id }}"
                                                                        {{ in_array($paket->id, $saksi->paket->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <label
                                                                        class="form-check-label">{{ $paket->nama_paket }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="foto">Foto <code
                                                                style="color:green;">opsional</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="custom-file">
                                                                <input type="file"
                                                                    accept="image/png, image/svg, image/jpeg"
                                                                    class="custom-file-input" id="foto" name="foto">
                                                                <label class="custom-file-label" for="foto"
                                                                    aria-describedby="foto">Pilih File</label>
                                                            </div>

                                                            <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                    mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                    JPEG, SVG, PNG & Maksimal ukuran file hanya 10
                                                                    MegaBytes</small></p>

                                                            @if ($errors->has('foto'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('foto') }}</p>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-actions text-right">
                                                    <a href="{{ route('saksi.index') }}" style="width:120px;"
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
                                        @endcan

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
        // Change event for Kecamatan dropdown
        $('#kecamatan_id').change(function() {
            var kecamatanId = $(this).val();
            if (kecamatanId != '') {
                $.ajax({
                    url: "{{ route('gd') }}",
                    method: "POST",
                    data: {
                        kecamatan_id: kecamatanId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: "json",
                    success: function(data) {
                        var options = '<option value="">Pilih Desa</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value
                                .nama_desa + '</option>';
                        });
                        $('#desa_id').html(options);
                        // Reset TPS dropdown
                        $('#tps').html('<option value="">Daftar TPS</option>');
                    }
                });
            } else {
                // Reset Desa and TPS dropdowns
                $('#desa_id').html('<option value="">Pilih Desa</option>');
                $('#tps').html('<option value="">Daftar TPS</option>');
            }
        });

        // Change event for Desa dropdown
        $('#desa_id').change(function() {
            var desaId = $(this).val();
            if (desaId != '') {
                $.ajax({
                    url: "{{ route('gt') }}",
                    method: "GET",
                    data: {
                        desa_id: desaId, // Corrected parameter name
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: "json",
                    success: function(data) {
                        var options = '<option value="">Daftar TPS</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value
                                .nama_tps + '</option>'; // Adjusted property name
                        });
                        $('#tps_id').html(options);
                    }
                });
            } else {
                // Reset TPS dropdown
                $('#tps_id').html('<option value="">Daftar TPS</option>');
            }
        });
        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
