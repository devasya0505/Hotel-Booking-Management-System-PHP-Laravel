@extends('layouts.admin')

@section('content')
    <style>
        /* Override the margin from admin layout */
        .container-fluid {
            margin-top: 0 !important;
            margin-left: 0 !important;
            padding-left: 0 !important;
            margin-right: 0 !important;
            padding-right: 0 !important;
        }

        #wrapper {
            margin-left: 0 !important;
        }

        body {
            padding-top: 0 !important;
        }
    </style>


    <div class="row justify-content-center align-items-center min-vh-1000">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="card-title mb-2 font-weight-bold">
                        <i class="fas fa-lock mr-2"></i>Admin Login
                    </h3>
                    <p class="mb-0 small">Enter your credentials to continue</p>
                </div>
                <div class="card-body p-4">
                    <!-- Error Message Display -->
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('check.login') }}">
                        @csrf

                        <!-- Email input -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label font-weight-bold text-dark mb-2">Email Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter your email" required />
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label font-weight-bold text-dark mb-2">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-key text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter your password" required />
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="form-group mt-4">
                            <button type="submit" name="submit"
                                class="btn btn-primary btn-lg btn-block font-weight-bold py-3">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login to Dashboard
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
