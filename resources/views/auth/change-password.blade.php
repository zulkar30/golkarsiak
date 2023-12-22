@extends('layouts.app')

@section('title', 'Ganti Password')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Ganti Password</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Aktifitas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/images/logo-golkar.svg') }}" class="img-fluid"
                                                alt="PPP Logo" width="95" height="95">
                                            <h5 class="h5 text-gray-900 mb-4 mt-3">GOLKAR</h5>
                                        </div>
                                        @if (session('status'))
                                            <div class="alert alert-success">{{ session('status') }}</div>
                                        @elseif(session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <form class="user" method="post"
                                            action="{{ route('user.change-password.update') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="old_password" name="old_password" placeholder="Password Lama">
                                                @error('old_password')
                                                    <small class="text-danger pl-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="new_password" name="new_password" placeholder="Password Baru">
                                                @error('new_password')
                                                    <small class="text-danger pl-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="repeat_password" name="repeat_password"
                                                    placeholder="Konrfirmasi Password">
                                                @error('repeat_password')
                                                    <small class="text-danger pl-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-user btn-block text-white"
                                                style="background-color: #F4CE14 ">
                                                Change Password
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                firstTab.click();
            }
        });
        // Fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });
    </script>
@endpush
