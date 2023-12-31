@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - User')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit User</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">User</li>
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
                                            <form class="form form-horizontal" action="{{ route('user.update', [$user->id]) }}"
                                                method="POST" enctype="multipart/form-data">

                                                @method('PUT')
                                                @csrf

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="fa fa-edit"></i> Form User</h4>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="name">Nama <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" placeholder="Nama Lengkap"
                                                                value="{{ old('name', isset($user) ? $user->name : '') }}"
                                                                autocomplete="off" required>

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
                                                                value="{{ old('email', isset($user) ? $user->email : '') }}"
                                                                autocomplete="off" data-inputmask="'alias': 'email'" required>

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
                                                                @foreach ($role as $id => $role)
                                                                    <option value="{{ $id }}"
                                                                        {{ in_array($id, old('role', [])) || (isset($user) && $user->role->contains($id)) ? 'selected' : '' }}>
                                                                        {{ $role }}</option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('role'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('role') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row {{ $errors->has('caleg_id') ? 'has-error' : '' }}"
                                                        id="calegInput">
                                                        <label class="col-md-3 label-control">Caleg <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="caleg_id" id="caleg_id" class="form-control select2">
                                                                <option
                                                                    value="{{ old('caleg_id', isset($user) ? $user->caleg_id : '') }}"
                                                                    selected>{{ $user->caleg->nama_caleg ?? '' }}
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

                                                    <div class="form-group row {{ $errors->has('paket_id') ? 'has-error' : '' }}"
                                                        id="paketInput">
                                                        <label class="col-md-3 label-control">Paket <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="paket_id" id="paket_id"
                                                                class="form-control select2">
                                                                <option
                                                                    value="{{ old('paket_id', isset($user) ? $user->paket_id : '') }}"
                                                                    selected>{{ $user->paket->nama_paket ?? '' }}
                                                                </option>
                                                                @foreach ($paket as $key => $paket_item)
                                                                    <option value="{{ $paket_item->id }}">
                                                                        {{ $paket_item->nama_paket }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('paket_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('paket_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row {{ $errors->has('kecamatan_id') ? 'has-error' : '' }}"
                                                        id="kecamatanInput">
                                                        <label class="col-md-3 label-control">Kecamatan <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="hidden" id="kecamatan_id" name="kecamatan_id"
                                                                value="{{ $user->kecamatan_id }}">
                                                            <select name="kecamatan_id" id="kecamatan_id"
                                                                class="form-control select2" disabled>
                                                                <option
                                                                    value="{{ old('kecamatan_id', isset($user) ? $user->kecamatan_id : '') }}"
                                                                    selected>
                                                                    {{ $user->kecamatan->nama_kecamatan ?? '' }}
                                                                </option>
                                                            </select>

                                                            @if ($errors->has('kecamatan_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('kecamatan_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row {{ $errors->has('desa_id') ? 'has-error' : '' }}"
                                                        id="desaInput">
                                                        <label class="col-md-3 label-control">Desa <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="hidden" id="desa_id" name="desa_id"
                                                                value="{{ $user->desa_id }}">
                                                            <select name="desa_id" id="desa_id"
                                                                class="form-control select2" disabled>
                                                                <option
                                                                    value="{{ old('desa_id', isset($user) ? $user->desa_id : '') }}"
                                                                    selected>
                                                                    {{ $user->desa->nama_desa ?? '' }}
                                                                </option>
                                                            </select>

                                                            @if ($errors->has('desa_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('desa_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row {{ $errors->has('tps_id') ? 'has-error' : '' }}"
                                                        id="tpsInput">
                                                        <label class="col-md-3 label-control">TPS <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="tps_id" id="tps_id"
                                                                class="form-control select2">
                                                                <option
                                                                    value="{{ old('tps_id', isset($user) ? $user->tps_id : '') }}"
                                                                    selected>
                                                                    {{ $user->tps->nama_tps ?? '' }}
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
                                                                    aria-describedby="foto">{{ isset($user->foto) ? basename($user->foto) : 'Pilih Foto' }}</label>
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
                                                    <a href="{{ route('user.index') }}" style="width:120px;"
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
        jQuery(document).ready(function($) {
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

        $(function() {
            $(":input").inputmask();
        });

        $(document).ready(function() {
            function toggleInputs(roleId) {
                // Semua elemen input terkait
                var calegInput = $('#calegInput');
                var paketInput = $('#paketInput');
                var kecamatanInput = $('#kecamatanInput');
                var desaInput = $('#desaInput');
                var tpsInput = $('#tpsInput');

                calegInput.hide();
                paketInput.hide();
                kecamatanInput.hide();
                desaInput.hide();
                tpsInput.hide();

                if (roleId == 2) {
                    calegInput.show();
                    kecamatanInput.show();
                } else if (roleId == 3) {
                    calegInput.show();
                    kecamatanInput.show();
                    desaInput.show();
                } else if (roleId == 4) {
                    calegInput.show();
                    kecamatanInput.show();
                    desaInput.show();
                    tpsInput.show();
                } else if (roleId == 5) {
                    calegInput.show();
                } else if (roleId == 6) {
                    paketInput.show();
                }
            }

            // Ambil elemen input role_id
            var roleInput = $('#role');

            // Panggil fungsi toggleInputs saat nilai role_id berubah
            roleInput.change(function() {
                toggleInputs($(this).val());
            });

            // Panggil fungsi toggleInputs saat halaman dimuat
            toggleInputs(roleInput.val());
        });
    </script>
@endpush
