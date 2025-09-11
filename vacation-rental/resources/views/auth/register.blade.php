@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="hero-wrap js-fullheight" style="margin-top: -25px;background-image: url('{{ asset('assets/images/image_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-middle" style="margin-left: 397px;">
            <div class="col-md-6 mt-5">
                <form action="{{ route('register') }}" method="POST" class="appointment-form" style="margin-top: -568px;">
                    @csrf
                    <h3 class="mb-3">Register</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="">

                                <label for="name">Username</label>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="">

                                <label for="email">Email ID</label>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="">

                                <label for="password">Password</label>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="">

                                <label for="password-confirm">Confirm Password</label>
                            
                            </div>
                        </div> -->

                        <div class="col-md-12">
                            <div class="form-floating custom-floating mb-3">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder=" "
                                    minlength="8">
                                <label for="password">Password</label>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating custom-floating mb-3">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder=" ">
                                <label for="password-confirm">Confirm Password</label>
                                <span id="confirm-feedback" class="invalid-feedback" role="alert" style="display:none;">
                                    <strong>Passwords do not match</strong>
                                </span>
                                <span id="match-feedback" class="valid-feedback" role="alert" style="display:none; color:green;">
                                    <strong>Passwords match</strong>
                                </span>
                            </div>
                        </div>

                        <!-- Real-time matching script -->
                        <script>
                            const password = document.getElementById('password');
                            const passwordConfirm = document.getElementById('password-confirm');
                            const feedback = document.getElementById('confirm-feedback');
                            const matchFeedback = document.getElementById('match-feedback');

                            function checkPasswordMatch() {
                                if (passwordConfirm.value === "") {
                                    passwordConfirm.classList.remove('is-invalid', 'is-valid');
                                    feedback.style.display = 'none';
                                    matchFeedback.style.display = 'none';
                                    return;
                                }

                                if (passwordConfirm.value !== password.value) {
                                    passwordConfirm.classList.add('is-invalid');
                                    passwordConfirm.classList.remove('is-valid');
                                    feedback.style.display = 'block';
                                    matchFeedback.style.display = 'none';
                                } else {
                                    passwordConfirm.classList.remove('is-invalid');
                                    passwordConfirm.classList.add('is-valid');
                                    feedback.style.display = 'none';
                                    matchFeedback.style.display = 'block';
                                }
                            }

                            password.addEventListener('input', checkPasswordMatch);
                            passwordConfirm.addEventListener('input', checkPasswordMatch);
                        </script>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Register" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection