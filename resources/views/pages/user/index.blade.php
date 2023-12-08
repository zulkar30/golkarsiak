@extends('layouts.app')

{{-- set title --}}
@section('title', 'User')

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
                    <h3 class="content-header-title mb-0 d-inline-block">User</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('user_create')
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
                                                <form class="form form-horizontal" action="{{ route('user.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-body">
                                                        <div class="form-section">
                                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                                anda menekan tombol submit.</p>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">Nama <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="name" name="name"
                                                                    class="form-control" placeholder="Nama Lengkap"
                                                                    value="{{ old('name') }}" autocomplete="off" required>

                                                                @if ($errors->has('name'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('name') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="email">Email <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="email" name="email"
                                                                    class="form-control" placeholder="Email valid"
                                                                    value="{{ old('email') }}" autocomplete="off"
                                                                    data-inputmask="'alias': 'email'" required>

                                                                @if ($errors->has('email'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('email') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row {{ $errors->has('role') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">Peran <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <label for="role">
                                                                    <span
                                                                        class="btn btn-warning btn-sm select-all">{{ 'Pilih Semua' }}</span>
                                                                    <span
                                                                        class="btn btn-warning btn-sm deselect-all">{{ 'Hapus Semua' }}</span>
                                                                </label>

                                                                <select name="role[]" id="role"
                                                                    class="form-control select2-full-bg" data-bgcolor="teal"
                                                                    data-bgcolor-variation="lighten-3" data-text-color="black"
                                                                    multiple="multiple" required>
                                                                    @foreach ($roles as $id => $roles)
                                                                        <option value="{{ $id }}"
                                                                            {{ in_array($id, old('roles', [])) || (isset($role) && $user->roles->contains($id)) ? 'selected' : '' }}>
                                                                            {{ $roles }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @if ($errors->has('role'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('role') }}</p>
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
                                                                <select name="desa_id" id="desa_id" class="form-control select2"
                                                                    required>
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

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="foto">Foto <code
                                                                    style="color:green;">optional</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        accept="image/png, image/svg, image/jpeg"
                                                                        class="custom-file-input" id="foto" name="foto">
                                                                    <label class="custom-file-label" for="foto"
                                                                        aria-describedby="foto">Pilih Foto</label>
                                                                </div>

                                                                <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                        mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                        JPEG, SVG, PNG & resolusi harus 100x100, Maksimal ukuran
                                                                        file hanya 10
                                                                        MegaBytes</small></p>

                                                                @if ($errors->has('foto'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('foto') }}</p>
                                                                @endif

                                                            </div>
                                                        </div>


                                                        <div
                                                            class="form-group row {{ $errors->has('caleg_id') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">Caleg <code
                                                                style="color:green;">optional</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="caleg_id" id="caleg_id" class="form-control select2"
                                                                    required>
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
                                                <form class="form form-horizontal" id="korcam_form"
                                                    action="{{ route('user.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-body">
                                                        <div class="form-section">
                                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                                anda menekan tombol submit.</p>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">Nama <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="name" name="name"
                                                                    class="form-control" placeholder="Nama Lengkap"
                                                                    value="{{ old('name') }}" autocomplete="off" required>

                                                                @if ($errors->has('name'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('name') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="email">Email <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="email" name="email"
                                                                    class="form-control" placeholder="Email valid"
                                                                    value="{{ old('email') }}" autocomplete="off"
                                                                    data-inputmask="'alias': 'email'" required>

                                                                @if ($errors->has('email'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('email') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row {{ $errors->has('role') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">Peran <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="role[]" id="role_korcam"
                                                                    class="form-control select2-full-bg" data-bgcolor="teal"
                                                                    data-bgcolor-variation="lighten-3" data-text-color="black"
                                                                    multiple="multiple" required>
                                                                    <option value=""></option>
                                                                </select>

                                                                @if ($errors->has('role'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('role') }}</p>
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

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="foto">Foto <code
                                                                    style="color:green;">optional</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        accept="image/png, image/svg, image/jpeg"
                                                                        class="custom-file-input" id="foto" name="foto">
                                                                    <label class="custom-file-label" for="foto"
                                                                        aria-describedby="foto">Pilih Foto</label>
                                                                </div>

                                                                <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                        mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                        JPEG, SVG, PNG & resolusi harus 100x100, Maksimal ukuran
                                                                        file hanya 10
                                                                        MegaBytes</small></p>

                                                                @if ($errors->has('foto'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('foto') }}</p>
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-actions text-right">
                                                        <button type="submit" id="korcamSubmit" style="width:120px;"
                                                            class="btn btn-cyan"
                                                            onclick="return confirm('Are you sure want to save this data ?')">
                                                            <i class="la la-check-square-o"></i> Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            @endcan

                                            @can('kordes_form')
                                                <form class="form form-horizontal" id="kordes_form"
                                                    action="{{ route('user.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-body">
                                                        <div class="form-section">
                                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                                anda menekan tombol submit.</p>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">Nama <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="name" name="name"
                                                                    class="form-control" placeholder="Nama Lengkap"
                                                                    value="{{ old('name') }}" autocomplete="off" required>

                                                                @if ($errors->has('name'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('name') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="email">Email <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input type="text" id="email" name="email"
                                                                    class="form-control" placeholder="Email valid"
                                                                    value="{{ old('email') }}" autocomplete="off"
                                                                    data-inputmask="'alias': 'email'" required>

                                                                @if ($errors->has('email'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('email') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row {{ $errors->has('role') ? 'has-error' : '' }}">
                                                            <label class="col-md-3 label-control">Peran <code
                                                                    style="color:red;">required</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <select name="role[]" id="role_kordes"
                                                                    class="form-control select2-full-bg" data-bgcolor="teal"
                                                                    data-bgcolor-variation="lighten-3" data-text-color="black"
                                                                    multiple="multiple" disabled>
                                                                    <option value=""></option>
                                                                </select>

                                                                @if ($errors->has('role'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('role') }}</p>
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

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="foto">Foto <code
                                                                    style="color:green;">optional</code></label>
                                                            <div class="col-md-9 mx-auto">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        accept="image/png, image/svg, image/jpeg"
                                                                        class="custom-file-input" id="foto" name="foto">
                                                                    <label class="custom-file-label" for="foto"
                                                                        aria-describedby="foto">Pilih Foto</label>
                                                                </div>

                                                                <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                        mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                        JPEG, SVG, PNG & resolusi harus 100x100, Maksimal ukuran
                                                                        file hanya 10
                                                                        MegaBytes</small></p>

                                                                @if ($errors->has('foto'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('foto') }}</p>
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-actions text-right">
                                                        <button type="submit" id="kordesSubmit" style="width:120px;"
                                                            class="btn btn-cyan"
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
            @can('user_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">User List</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
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
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Peran</th>
                                                            <th>Kecamatan</th>
                                                            <th>Desa</th>
                                                            <th>Foto</th>
                                                            <th style="text-align:center; width:150px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($user as $key => $user_item)
                                                            <tr data-entry-id="{{ $user_item->id }}">
                                                                <td>{{ date('d/m/Y H:i:s', strtotime($user_item->created_at)) ?? '' }}
                                                                </td>
                                                                <td>{{ $user_item->name ?? '' }}</td>
                                                                <td>{{ $user_item->email ?? '' }}</td>
                                                                <td>
                                                                    @foreach ($user_item->role as $key => $item)
                                                                        <span
                                                                            class="badge bg-yellow text-dark mr-1 mb-1">{{ $item->name }}</span>
                                                                    @endforeach
                                                                </td>
                                                                <td>{{ $user_item->kecamatan->nama_kecamatan ?? '' }}</td>
                                                                <td>{{ $user_item->desa->nama_desa ?? '' }}</td>
                                                                <td><a data-fancybox="gallery"
                                                                        data-src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $user_item->foto }}"
                                                                        class="blue accent-4">Lihat</a></td>
                                                                <td class="text-center">
                                                                    @can('user_show')
                                                                        <a href="#mymodal"
                                                                            data-remote="{{ route('user.show', $user_item->id) }}"
                                                                            data-toggle="modal" data-target="#mymodal"
                                                                            data-title="User Detail" class="badge badge-info"
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
                                                                    @can('user_edit')
                                                                        <a href="{{ route('user.edit', $user_item->id) }}"
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
                                                                    @can('user_delete')
                                                                        <a href="#" class="badge badge-danger"
                                                                            data-tooltip="Tooltip on top" title="Hapus"
                                                                            onclick="deleteUser({{ $user_item->id }})"><svg
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

        function deleteUser(userId) {
            if (confirm('Anda yakin ingin menghapus user ini?')) {
                var form = document.createElement('form');
                form.action = '{{ route('user.destroy', '__id') }}'.replace('__id', userId);
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

        // Ngatur Role
        $(document).ready(function() {
            var roles_korcam = [{
                id: 3,
                name: 'KORDES'
            }];

            roles_korcam.forEach(function(role) {
                $('#role_korcam').append('<option value="' + role.id + '">' + role.name + '</option>');
            });

            $('#role_korcam').prop('disabled', false);
            $('#korcamSubmit').on('click', function() {
                var selectedRoles = $('#role_korcam').val();
                var formData = new FormData();

                if (selectedRoles.indexOf("3") === -1) {
                    selectedRoles.push("3");
                }

                formData.append('role', selectedRoles);

                $.ajax({
                    url: '{{ route('user.store') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        alert('Berhasil Menambahkan User Baru');
                        window.location.href =
                            '{{ route('user.index') }}';
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });

            var roles_kordes = [{
                id: 4,
                name: 'KORTPS'
            }];

            roles_kordes.forEach(function(role) {
                $('#role_kordes').append('<option value="' + role.id + '">' + role.name + '</option>');
            });

            $('#role_kordes').prop('disabled', false);
            $('#kordesSubmit').on('click', function() {
                var selectedRoles = $('#role_kordes').val();
                var formData = new FormData();

                if (selectedRoles.indexOf("4") === -1) {
                    selectedRoles.push("4");
                }

                formData.append('role', selectedRoles);

                $.ajax({
                    url: '{{ route('user.store') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        alert('Berhasil Menambahkan User Baru');
                        window.location.href =
                            '{{ route('user.index') }}';
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
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
