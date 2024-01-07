@extends('layouts.app')

{{-- set title --}}
@section('title', 'Saksi')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Saksi</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Saksi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('saksi_create')
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

                                            @can('korkab_form')
                                                <form class="form form-horizontal" action="{{ route('saksi.store') }}"
                                                    method="POST" enctype="multipart/form-data">

                                                    @csrf

                                                    <div class="form-body">
                                                        <div class="form-section">
                                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                                anda menekan tombol submit.</p>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9"><a
                                                                    href="{{ url('https://cekdptonline.kpu.go.id/') }}"
                                                                    target="_blank" style="width:120px;" class="btn btn-danger"><i
                                                                        class="la la-check-square-o"></i>
                                                                    Cek DPT</a></div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">Nama <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                <input type="text" id="nama" name="nama"
                                                                    class="form-control" placeholder="Nama Lengkap"
                                                                    value="{{ old('nama') }}" autocomplete="off" required>

                                                                @if ($errors->has('nama'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('nama') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">NIK <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="number" id="nik" name="nik"
                                                                    class="form-control" placeholder="Nomor Induk Kependudukan"
                                                                    value="{{ old('nik') }}" autocomplete="off" required>

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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Jenis Kelamin
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
                                                                        value="{{ old('no_hp') }}" autocomplete="off">
                                                                </div>

                                                                @if ($errors->has('no_hp'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('no_hp') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="umur">Umur <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="number" id="umur" name="umur"
                                                                    placeholder="Umur" class="form-control"
                                                                    value="{{ old('umur') }}" autocomplete="off">

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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Kecamatan
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Desa
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        TPS
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Status
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Caleg
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
                                                                            name="paket[]" value="{{ $paket->id }}">
                                                                        <label
                                                                            class="form-check-label">{{ $paket->nama_paket }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="foto">Foto <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        accept="image/png, image/svg, image/jpeg"
                                                                        class="custom-file-input" id="foto" name="foto"
                                                                        required>
                                                                    <label class="custom-file-label" for="foto"
                                                                        aria-describedby="foto">Pilih File</label>
                                                                </div>

                                                                <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                        mengunggah 1 file</small><small> dan foto yang digunakan
                                                                        harus foto selfie memegang KTP</small></p>

                                                                @if ($errors->has('foto'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('foto') }}</p>
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="keterangan">Keterangan
                                                                <code style="color:green;">optional</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="keterangan" name="keterangan"
                                                                    class="form-control" placeholder="Keterangan"
                                                                    value="{{ old('keterangan') }}" autocomplete="off">

                                                                @if ($errors->has('keterangan'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('keterangan') }}</p>
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
                                            @endcan

                                            @can('korcam_form')
                                                <form class="form form-horizontal" action="{{ route('saksi.store') }}"
                                                    method="POST" enctype="multipart/form-data">

                                                    @csrf

                                                    <div class="form-body">
                                                        <div class="form-section">
                                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                                anda menekan tombol submit.</p>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9"><a
                                                                    href="{{ url('https://cekdptonline.kpu.go.id/') }}"
                                                                    target="_blank" style="width:120px;"
                                                                    class="btn btn-danger"><i class="la la-check-square-o"></i>
                                                                    Cek DPT</a></div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">Nama <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::user()->id }}">
                                                                <input type="text" id="nama" name="nama"
                                                                    class="form-control" placeholder="Nama Lengkap"
                                                                    value="{{ old('nama') }}" autocomplete="off" required>

                                                                @if ($errors->has('nama'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('nama') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">NIK <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="number" id="nik" name="nik"
                                                                    class="form-control" placeholder="Nomor Induk Kependudukan"
                                                                    value="{{ old('nik') }}" autocomplete="off" required>

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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Jenis Kelamin
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
                                                                        value="{{ old('no_hp') }}" autocomplete="off">
                                                                </div>

                                                                @if ($errors->has('no_hp'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('no_hp') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="umur">Umur <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="number" id="umur" name="umur"
                                                                    placeholder="Umur" class="form-control"
                                                                    value="{{ old('umur') }}" autocomplete="off">

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
                                                                value="{{ Auth::user()->kecamatan_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="kecamatan_id" id="kecamatan_id"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->kecamatan_id }}" selected>
                                                                        {{ Auth::user()->kecamatan->nama_kecamatan }}
                                                                    </option>
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Desa
                                                                    </option>
                                                                    @foreach ($desa as $key => $desa_item)
                                                                        <option value="{{ $desa_item->id }}"
                                                                            data-kecamatan="{{ $desa_item->kecamatan_id }}">
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        TPS
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Status
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
                                                            <input type="hidden" name="caleg_id"
                                                                value="{{ Auth::user()->caleg_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="caleg_id" id="caleg_id"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->caleg_id }}" selected>
                                                                        {{ Auth::user()->caleg->nama_caleg }}
                                                                    </option>
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
                                                                            name="paket[]" value="{{ $paket->id }}">
                                                                        <label
                                                                            class="form-check-label">{{ $paket->nama_paket }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="foto">Foto <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        accept="image/png, image/svg, image/jpeg"
                                                                        class="custom-file-input" id="foto" name="foto"
                                                                        required>
                                                                    <label class="custom-file-label" for="foto"
                                                                        aria-describedby="foto">Pilih File</label>
                                                                </div>

                                                                <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                        mengunggah 1 file</small><small> dan foto yang digunakan
                                                                        harus foto selfie memegang KTP</small></p>

                                                                @if ($errors->has('foto'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('foto') }}</p>
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="keterangan">Keterangan
                                                                <code style="color:green;">optional</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="keterangan" name="keterangan"
                                                                    class="form-control" placeholder="Keterangan"
                                                                    value="{{ old('keterangan') }}" autocomplete="off">

                                                                @if ($errors->has('keterangan'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('keterangan') }}</p>
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
                                            @endcan

                                            @can('kordes_form')
                                                <form class="form form-horizontal" action="{{ route('saksi.store') }}"
                                                    method="POST" enctype="multipart/form-data">

                                                    @csrf

                                                    <div class="form-body">
                                                        <div class="form-section">
                                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                                anda menekan tombol submit.</p>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9"><a
                                                                    href="{{ url('https://cekdptonline.kpu.go.id/') }}"
                                                                    target="_blank" style="width:120px;"
                                                                    class="btn btn-danger"><i class="la la-check-square-o"></i>
                                                                    Cek DPT</a></div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">Nama <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::user()->id }}">
                                                                <input type="text" id="nama" name="nama"
                                                                    class="form-control" placeholder="Nama Lengkap"
                                                                    value="{{ old('nama') }}" autocomplete="off" required>

                                                                @if ($errors->has('nama'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('nama') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">NIK <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="number" id="nik" name="nik"
                                                                    class="form-control" placeholder="Nomor Induk Kependudukan"
                                                                    value="{{ old('nik') }}" autocomplete="off" required>

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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Jenis Kelamin
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
                                                                        value="{{ old('no_hp') }}" autocomplete="off">
                                                                </div>

                                                                @if ($errors->has('no_hp'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('no_hp') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="umur">Umur <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="number" id="umur" name="umur"
                                                                    placeholder="Umur" class="form-control"
                                                                    value="{{ old('umur') }}" autocomplete="off">

                                                                @if ($errors->has('umur'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('umur') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group row {{ $errors->has('kecamatan_id_kordes') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">Kecamatan <code
                                                                    style="color:red;">required</code></label>
                                                            <input type="hidden" name="kecamatan_id"
                                                                value="{{ Auth::user()->kecamatan_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="kecamatan_id_kordes" id="kecamatan_id_kordes"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->kecamatan_id }}" selected>
                                                                        {{ Auth::user()->kecamatan->nama_kecamatan }}
                                                                    </option>
                                                                </select>

                                                                @if ($errors->has('kecamatan_id_kordes'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('kecamatan_id_kordes') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group row {{ $errors->has('desa_id') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">Desa <code
                                                                    style="color:red;">required</code></label>
                                                            <input type="hidden" name="desa_id"
                                                                value="{{ Auth::user()->desa_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="desa_id" id="desa_id"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->desa_id }}" selected>
                                                                        {{ Auth::user()->desa->nama_desa }}
                                                                    </option>
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        TPS
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Status
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
                                                            <input type="hidden" name="caleg_id"
                                                                value="{{ Auth::user()->caleg_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="caleg_id" id="caleg_id"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->caleg_id }}" selected>
                                                                        {{ Auth::user()->caleg->nama_caleg }}
                                                                    </option>
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
                                                                            name="paket[]" value="{{ $paket->id }}">
                                                                        <label
                                                                            class="form-check-label">{{ $paket->nama_paket }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="foto">Foto <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        accept="image/png, image/svg, image/jpeg"
                                                                        class="custom-file-input" id="foto" name="foto"
                                                                        required>
                                                                    <label class="custom-file-label" for="foto"
                                                                        aria-describedby="foto">Pilih File</label>
                                                                </div>

                                                                <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                        mengunggah 1 file</small><small> dan foto yang digunakan
                                                                        harus foto selfie memegang KTP</small></p>

                                                                @if ($errors->has('foto'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('foto') }}</p>
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="keterangan">Keterangan
                                                                <code style="color:green;">optional</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="keterangan" name="keterangan"
                                                                    class="form-control" placeholder="Keterangan"
                                                                    value="{{ old('keterangan') }}" autocomplete="off">

                                                                @if ($errors->has('keterangan'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('keterangan') }}</p>
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
                                            @endcan

                                            @can('kortps_form')
                                                <form class="form form-horizontal" action="{{ route('saksi.store') }}"
                                                    method="POST" enctype="multipart/form-data">

                                                    @csrf

                                                    <div class="form-body">
                                                        <div class="form-section">
                                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                                anda menekan tombol submit.</p>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9"><a
                                                                    href="{{ url('https://cekdptonline.kpu.go.id/') }}"
                                                                    target="_blank" style="width:120px;"
                                                                    class="btn btn-danger"><i class="la la-check-square-o"></i>
                                                                    Cek DPT</a></div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">Nama <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::user()->id }}">
                                                                <input type="text" id="nama" name="nama"
                                                                    class="form-control" placeholder="Nama Lengkap"
                                                                    value="{{ old('nama') }}" autocomplete="off" required>

                                                                @if ($errors->has('nama'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('nama') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">NIK <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="number" id="nik" name="nik"
                                                                    class="form-control" placeholder="Nomor Induk Kependudukan"
                                                                    value="{{ old('nik') }}" autocomplete="off" required>

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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Jenis Kelamin
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
                                                                        value="{{ old('no_hp') }}" autocomplete="off">
                                                                </div>

                                                                @if ($errors->has('no_hp'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('no_hp') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="umur">Umur <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="number" id="umur" name="umur"
                                                                    placeholder="Umur" class="form-control"
                                                                    value="{{ old('umur') }}" autocomplete="off">

                                                                @if ($errors->has('umur'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('umur') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group row {{ $errors->has('kecamatan_id_kortps') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">Kecamatan <code
                                                                    style="color:red;">required</code></label>
                                                            <input type="hidden" name="kecamatan_id"
                                                                value="{{ Auth::user()->kecamatan_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="kecamatan_id_kortps" id="kecamatan_id_kortps"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->kecamatan_id }}" selected>
                                                                        {{ Auth::user()->kecamatan->nama_kecamatan }}
                                                                    </option>
                                                                </select>

                                                                @if ($errors->has('kecamatan_id_kortps'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('kecamatan_id_kortps') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group row {{ $errors->has('desa_id') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">Desa <code
                                                                    style="color:red;">required</code></label>
                                                            <input type="hidden" name="desa_id"
                                                                value="{{ Auth::user()->desa_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="desa_id" id="desa_id"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->desa_id }}" selected>
                                                                        {{ Auth::user()->desa->nama_desa }}
                                                                    </option>
                                                                </select>

                                                                @if ($errors->has('desa_id'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('desa_id') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group row {{ $errors->has('tps_id_kortps') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">TPS <code
                                                                    style="color:red;">required</code></label>
                                                            <input type="hidden" name="tps_id"
                                                                value="{{ Auth::user()->tps_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="tps_id_kortps" id="tps_id_kortps"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->tps_id }}" selected>
                                                                        {{ Auth::user()->tps->nama_tps }}
                                                                    </option>
                                                                </select>

                                                                @if ($errors->has('tps_id_kortps'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('tps_id_kortps') }}</p>
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
                                                                    <option value="{{ '' }}" disabled selected>Pilih
                                                                        Status
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
                                                            <input type="hidden" name="caleg_id"
                                                                value="{{ Auth::user()->caleg_id }}">
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="caleg_id" id="caleg_id"
                                                                    class="form-control select2" disabled>
                                                                    <option value="{{ Auth::user()->caleg_id }}" selected>
                                                                        {{ Auth::user()->caleg->nama_caleg }}
                                                                    </option>
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
                                                                            name="paket[]" value="{{ $paket->id }}">
                                                                        <label
                                                                            class="form-check-label">{{ $paket->nama_paket }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="foto">Foto <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        accept="image/png, image/svg, image/jpeg"
                                                                        class="custom-file-input" id="foto" name="foto"
                                                                        required>
                                                                    <label class="custom-file-label" for="foto"
                                                                        aria-describedby="foto">Pilih File</label>
                                                                </div>

                                                                <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                        mengunggah 1 file</small><small> dan foto yang digunakan
                                                                        harus foto selfie memegang KTP</small></p>

                                                                @if ($errors->has('foto'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('foto') }}</p>
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="keterangan">Keterangan
                                                                <code style="color:green;">optional</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="keterangan" name="keterangan"
                                                                    class="form-control" placeholder="Keterangan"
                                                                    value="{{ old('keterangan') }}" autocomplete="off">

                                                                @if ($errors->has('keterangan'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('keterangan') }}</p>
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
                                            @endcan

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
                                                <div class="buttons-wrapper">
                                                    <!-- Buttons container will be appended here -->
                                                </div>
                                                <table
                                                    class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Entri</th>
                                                            <th>Nama</th>
                                                            <th>NIK</th>
                                                            <th>Whatsapp</th>
                                                            <th>Caleg Pilihan</th>
                                                            <th>Status</th>
                                                            <th>Foto</th>
                                                            <th style="text-align:center;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($saksi as $key => $saksi_item)
                                                            <tr data-entry-id="{{ $saksi_item->id }}">
                                                                <td>{{ isset($saksi_item->created_at) ? date('d/m/Y H:i:s', strtotime($saksi_item->created_at)) : '' }}
                                                                </td>
                                                                <td>{{ $saksi_item->user->name ?? '' }}</td>
                                                                <td>{{ $saksi_item->nama ?? '' }}</td>
                                                                <td>{{ $saksi_item->nik ?? '' }}</td>
                                                                <td>
                                                                            <!-- Ikon WhatsApp -->
                                                                            <a target="_blank"
                                                                                href="https://api.whatsapp.com/send?phone={{ $saksi_item->no_hp }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgba(0, 0, 0, 1); transform: ;msFilter:;">
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                                                                                    </path>
                                                                                </svg>
                                                                            </a>

                                                                            <!-- Ikon Telepon -->
                                                                            <a target="_blank"
                                                                                href="tel:{{ $saksi_item->no_hp }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                                                    <path
                                                                                        d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z">
                                                                                    </path>
                                                                                </svg>
                                                                            </a>
                                                                        </td>
                                                                <td>{{ $saksi_item->caleg->nama_caleg ?? '' }}</td>
                                                                <td>
                                                                    @if ($saksi_item->status == 'active')
                                                                        <span
                                                                            class="badge badge-pill badge-success">Aktif</span>
                                                                    @elseif ($saksi_item->status == 'passive')
                                                                        <span
                                                                            class="badge badge-pill badge-danger">Pasif</span>
                                                                    @endif
                                                                </td>
                                                                <td><a data-fancybox="gallery"
                                                                        data-src="{{ request()->getSchemeAndHttpHost() . '/storage/assets/file-saksi' . '/' . $saksi_item->foto }}"
                                                                        class="blue accent-4">Lihat</a></td>
                                                                <td class="text-center">
                                                                    @can('saksi_show')
                                                                        <a href="#mymodal"
                                                                            data-remote="{{ route('saksi.show', $saksi_item->id) }}"
                                                                            data-toggle="modal" data-target="#mymodal"
                                                                            data-title="saksi Detail" class="badge badge-info"
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
                                                                    @can('saksi_edit')
                                                                        <a href="{{ route('saksi.edit', $saksi_item->id) }}"
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
                                                                    @can('saksi_delete')
                                                                        <a href="#" class="badge badge-danger"
                                                                            data-tooltip="Tooltip on top" title="Hapus"
                                                                            onclick="deletesaksi({{ $saksi_item->id }})"><svg
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
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Entri</th>
                                                            <th>Nama</th>
                                                            <th>NIK</th>
                                                            <th>Whatsapp</th>
                                                            <th>Caleg Pilihan</th>
                                                            <th>Status</th>
                                                            <th>Foto</th>
                                                            <th style="text-align:center; width:150px;">Aksi</th>
                                                        </tr>
                                                    </tfoot>
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

            @can('saksi_table')
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
                                                            <th>Tanggal</th>
                                                            <th>Entri</th>
                                                            <th>Nama</th>
                                                            <th>NIK</th>
                                                            <th>Whatsapp</th>
                                                            <th>Caleg Pilihan</th>
                                                            <th>Status</th>
                                                            <th>Foto</th>
                                                            <th style="text-align:center;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($saksiUser as $key => $saksi_item)
                                                            <tr data-entry-id="{{ $saksi_item->id }}">
                                                                <td>{{ isset($saksi_item->created_at) ? date('d/m/Y H:i:s', strtotime($saksi_item->created_at)) : '' }}
                                                                </td>
                                                                <td>{{ $saksi_item->user->name ?? '' }}</td>
                                                                <td>{{ $saksi_item->nama ?? '' }}</td>
                                                                <td>{{ $saksi_item->nik ?? '' }}</td>
                                                                <td>
                                                                            <!-- Ikon WhatsApp -->
                                                                            <a target="_blank"
                                                                                href="https://api.whatsapp.com/send?phone={{ $saksi_item->no_hp }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgba(0, 0, 0, 1); transform: ;msFilter:;">
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                                                                                    </path>
                                                                                </svg>
                                                                            </a>

                                                                            <!-- Ikon Telepon -->
                                                                            <a target="_blank"
                                                                                href="tel:{{ $saksi_item->no_hp }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                                                    <path
                                                                                        d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z">
                                                                                    </path>
                                                                                </svg>
                                                                            </a>
                                                                        </td>
                                                                <td>{{ $saksi_item->caleg->nama_caleg ?? '' }}</td>
                                                                <td>
                                                                    @if ($saksi_item->status == 'active')
                                                                        <span
                                                                            class="badge badge-pill badge-success">Aktif</span>
                                                                    @elseif ($saksi_item->status == 'passive')
                                                                        <span
                                                                            class="badge badge-pill badge-danger">Pasif</span>
                                                                    @endif
                                                                </td>
                                                                <td><a data-fancybox="gallery"
                                                                        data-src="{{ request()->getSchemeAndHttpHost() . '/storage/assets/file-saksi' . '/' . $saksi_item->foto }}"
                                                                        class="blue accent-4">Lihat</a></td>
                                                                <td class="text-center">
                                                                    @can('saksi_show')
                                                                        <a href="#mymodal"
                                                                            data-remote="{{ route('saksi.show', $saksi_item->id) }}"
                                                                            data-toggle="modal" data-target="#mymodal"
                                                                            data-title="saksi Detail" class="badge badge-info"
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
                                                                    @can('saksi_edit')
                                                                        <a href="{{ route('saksi.edit', $saksi_item->id) }}"
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
                                                                    @can('saksi_delete')
                                                                        <a href="#" class="badge badge-danger"
                                                                            data-tooltip="Tooltip on top" title="Hapus"
                                                                            onclick="deletesaksi({{ $saksi_item->id }})"><svg
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
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Entri</th>
                                                            <th>Nama</th>
                                                            <th>NIK</th>
                                                            <th>Whatsapp</th>
                                                            <th>Caleg Pilihan</th>
                                                            <th>Status</th>
                                                            <th>Foto</th>
                                                            <th style="text-align:center; width:150px;">Aksi</th>
                                                        </tr>
                                                    </tfoot>
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

        // Initialize DataTables
        var dataTable = $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });

        // Initialize Buttons separately
        new $.fn.dataTable.Buttons(dataTable, {
            // dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'colvis',
                    text: 'Visibility'
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        columns: ':visible',
                        format: {
                            body: function (data, row, column, node) {
                                if (data && data !== null) {
                                    if (column === 4) {
                                        var whatsappLink = $(node).find('a').attr('href');
                                        if (whatsappLink) {
                                            var phoneNumber = whatsappLink.match(/phone=(\d+)/);
                                            return phoneNumber ? phoneNumber[1] : '';
                                        }
                                    }
                                    else if (column === 5) {
                                        return $(data).text();
                                    }
                                }
                                return data;
                            }
                        }
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: ':visible',
                        format: {
                            body: function (data, row, column, node) {
                                if (data && data !== null) {
                                    if (column === 4) {
                                        var whatsappLink = $(node).find('a').attr('href');
                                        if (whatsappLink) {
                                            var phoneNumber = whatsappLink.match(/phone=(\d+)/);
                                            return phoneNumber ? phoneNumber[1] : '';
                                        }
                                    }
                                    else if (column === 6) {
                                        return $(data).text();
                                    }
                                }
                                return data;
                            }
                        }
                    }
                }
            ],
            exportData: {
                stripHtml: false
            }
        }).container().appendTo($('.buttons-wrapper'));


        $(function() {
            $(":input").inputmask();
        });

        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });

        function deletesaksi(saksiId) {
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                var form = document.createElement('form');
                form.action = '{{ route('saksi.destroy', '__id') }}'.replace('__id', saksiId);
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
            // Kordes
            $('#kecamatan_id_kordes').change(function() {
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
                            $('#tps').html('<option value="">Daftar TPS</option>');
                        }
                    });
                } else {
                    $('#desa_id').html('<option value="">Pilih Desa</option>');
                    $('#tps').html('<option value="">Daftar TPS</option>');
                }
            });

            $('#desa_id_kordes').change(function() {
                var desaId = $(this).val();
                if (desaId != '') {
                    $.ajax({
                        url: "{{ route('gt') }}",
                        method: "GET",
                        data: {
                            desa_id: desaId,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            var options = '<option value="">Daftar TPS</option>';
                            $.each(data, function(key, value) {
                                options += '<option value="' + value.id + '">' + value
                                    .nama_tps + '</option>';
                            });
                            $('#tps_id').html(options);
                        }
                    });
                } else {
                    $('#tps_id').html('<option value="">Daftar TPS</option>');
                }
            });

            // Korcam dan korkab
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
                            $('#tps').html('<option value="">Daftar TPS</option>');
                        }
                    });
                } else {
                    $('#desa_id').html('<option value="">Pilih Desa</option>');
                    $('#tps').html('<option value="">Daftar TPS</option>');
                }
            });

            $('#desa_id').change(function() {
                var desaId = $(this).val();
                if (desaId != '') {
                    $.ajax({
                        url: "{{ route('gt') }}",
                        method: "GET",
                        data: {
                            desa_id: desaId,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            var options = '<option value="">Daftar TPS</option>';
                            $.each(data, function(key, value) {
                                options += '<option value="' + value.id + '">' + value
                                    .nama_tps + '</option>';
                            });
                            $('#tps_id').html(options);
                        }
                    });
                } else {
                    $('#tps_id').html('<option value="">Daftar TPS</option>');
                }
            });

            $('#kecamatan_id').trigger('change');
            $('#desa_id').trigger('change');

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
