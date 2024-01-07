@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <div class="container">
        <!-- Outer Row -->
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
                                        <h5 class="h5 text-gray-900 mb-4 mt-3">GOLKAR KABUPATEN SIAK</h5>
                                    </div>
                                    <form class="user" method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email"
                                                name="email" placeholder="Enter Email Address..."
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <small class="text-danger pl-3">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password">
                                            @error('password')
                                                <small class="text-danger pl-3">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block text-white"
                                            style="background-color: #F4CE14 ">
                                            Login
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


@endsection
