@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 font-weight-bold">
                        <i class="fas fa-hotel mr-2"></i>Hotels Management
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
                                <div class="progress-bar bg-success" id="countdownBar"
                                    style="width: 100%; transition: width 0.1s linear;"></div>
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0 font-weight-bold text-dark">All Hotels</h5>
                        <a href="{{ route('hotels.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle mr-2"></i>Create Hotel
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Hotel Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" class="text-center">Update</th>
                                    <th scope="col" class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hotels as $hotel)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $hotel->id }}</th>
                                        <td class="font-weight-bold text-primary">{{ $hotel->name }}</td>
                                        <td>
                                            <span class="badge badge-info py-2 px-3">
                                                <i class="fas fa-map-marker-alt mr-1"></i>{{ $hotel->location }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-muted">
                                                {{ $hotel->description }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="update-category.html" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit mr-1"></i>Update
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="delete-category.html" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Optional: Add pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Showing {{ $hotels->count() }} hotels
                        </div>
                        <!-- If you have pagination, uncomment this -->
                        {{-- <!-- {{ $hotels->links() }} --> --}}
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
