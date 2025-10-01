@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 font-weight-bold">
                        <i class="fas fa-user-plus mr-2"></i>Create New Admin
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <!-- Email input -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label font-weight-bold">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg"
                                placeholder="Enter email address" required />
                        </div>

                        <!-- Username input -->
                        <div class="form-group mb-4">
                            <label for="username" class="form-label font-weight-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg"
                                placeholder="Enter username" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label font-weight-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg"
                                placeholder="Enter password" required />
                        </div>

                        <!-- Submit button -->
                        <div class="form-group mt-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block font-weight-bold">
                                <i class="fas fa-plus-circle mr-2"></i>Create Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
