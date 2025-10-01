@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 font-weight-bold">
                        <i class="fas fa-users mr-2"></i>Admins
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Success Message with Countdown Animation -->
                    @if (session()->has('success'))
                        <div class="alert alert-success border-0 shadow-sm mb-4" role="alert" id="successAlert"
                            style="position: relative;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                style="position: absolute; top: 10px; right: 15px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle fa-lg mr-3"></i>
                                <div>
                                    <h6 class="alert-heading font-weight-bold mb-1">Success!</h6>
                                    <p class="mb-0">{{ session()->get('success') }}</p>
                                </div>
                            </div>
                            <div class="progress mt-3" style="height: 5px; background-color: rgba(0,0,0,0.1);">
                                <div class="progress-bar bg-success" id="countdownBar"
                                    style="width: 100%; transition: width 0.05s linear;"></div>
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0 font-weight-bold">Admins List</h5>
                        <a href="{{ route('admins.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-2"></i>Create Admin
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $admin->id }}</th>
                                        <td class="font-weight-bold">{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('successAlert');
            const countdownBar = document.getElementById('countdownBar');

            if (successAlert && countdownBar) {
                let width = 100;
                const duration = 4000; // 4 seconds
                const intervalTime = 40; // Update every 40ms for smoother animation
                const decrement = (intervalTime / duration) * 100;

                const countdownInterval = setInterval(() => {
                    width -= decrement;
                    countdownBar.style.width = width + '%';

                    if (width <= 0) {
                        clearInterval(countdownInterval);
                        successAlert.style.transform = 'translateX(100%)';
                        successAlert.style.opacity = '0';
                        setTimeout(() => successAlert.remove(), 500);
                    }
                }, intervalTime);

                // Manual close
                successAlert.querySelector('.close').addEventListener('click', function() {
                    clearInterval(countdownInterval);
                    successAlert.style.transform = 'translateX(100%)';
                    successAlert.style.opacity = '0';
                    setTimeout(() => successAlert.remove(), 500);
                });
            }
        });
    </script>
@endsection
