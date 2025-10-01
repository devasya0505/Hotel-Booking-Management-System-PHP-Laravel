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
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" id="successAlert">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="font-weight-bold">{{ session()->get('success') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="progress mt-2" style="height: 4px; background-color: #e9ecef;">
                                <div class="progress-bar bg-success" id="countdownBar" style="width: 100%; transition: width 0.1s linear;"></div>
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
                                    {{-- <th scope="col" class="text-center">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <th scope="row" class="text-center">{{ $admin->id }}</th>
                                    <td class="font-weight-bold">{{ $admin->name}}</td>
                                    <td>{{ $admin->email}}</td>
                                    {{-- <td class="text-center">
                                        <button class="btn btn-warning btn-sm mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td> --}}
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
                const intervalTime = 50; // Update every 50ms
                const decrement = (intervalTime / duration) * 100;
                
                const countdownInterval = setInterval(() => {
                    width -= decrement;
                    countdownBar.style.width = width + '%';
                    
                    if (width <= 0) {
                        clearInterval(countdownInterval);
                        successAlert.style.opacity = '0';
                        setTimeout(() => {
                            successAlert.remove();
                        }, 300);
                    }
                }, intervalTime);
                
                // Also allow manual close
                successAlert.querySelector('.close').addEventListener('click', function() {
                    clearInterval(countdownInterval);
                    successAlert.style.opacity = '0';
                    setTimeout(() => {
                        successAlert.remove();
                    }, 300);
                });
            }
        });
    </script>

    <style>
        .progress {
            border-radius: 2px;
            overflow: hidden;
        }
        .progress-bar {
            border-radius: 2px;
        }
    </style>
@endsection