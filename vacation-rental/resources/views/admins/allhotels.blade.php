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
                    @if (session()->has('update'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" id="updateAlert">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="font-weight-bold">{{ session()->get('update') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="progress mt-2" style="height: 4px; background-color: #e9ecef;">
                                <div class="progress-bar bg-success" id="countdownBarUpdate"
                                    style="width: 100%; transition: width 0.1s linear;"></div>
                            </div>
                        </div>
                    @endif
                    @if (session()->has('delete'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" id="deleteAlert">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="font-weight-bold">{{ session()->get('delete') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="progress mt-2" style="height: 4px; background-color: #e9ecef;">
                                <div class="progress-bar bg-success" id="countdownBarDelete"
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
                                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit mr-1"></i>Update
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-hotel-id="{{ $hotel->id }}" data-hotel-name="{{ $hotel->name }}">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title font-weight-bold" id="deleteModalLabel">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Confirm Deletion
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete hotel "<strong id="hotelName"></strong>"?</p>
                    <p class="text-danger mb-0">
                        <i class="fas fa-info-circle mr-1"></i>This action cannot be undone.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Cancel
                    </button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash mr-1"></i>Yes, Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to handle countdown for any alert
            function setupCountdown(alertElement, barElement) {
                if (alertElement && barElement) {
                    let width = 100;
                    const duration = 4000; // 4 seconds
                    const intervalTime = 50; // Update every 50ms
                    const decrement = (intervalTime / duration) * 100;

                    const countdownInterval = setInterval(() => {
                        width -= decrement;
                        barElement.style.width = width + '%';

                        if (width <= 0) {
                            clearInterval(countdownInterval);
                            alertElement.style.opacity = '0';
                            setTimeout(() => {
                                alertElement.remove();
                            }, 300);
                        }
                    }, intervalTime);

                    // Also allow manual close
                    alertElement.querySelector('.close').addEventListener('click', function() {
                        clearInterval(countdownInterval);
                        alertElement.style.opacity = '0';
                        setTimeout(() => {
                            alertElement.remove();
                        }, 300);
                    });
                }
            }

            // Setup countdown for all alerts
            const successAlert = document.getElementById('successAlert');
            const countdownBar = document.getElementById('countdownBar');
            setupCountdown(successAlert, countdownBar);

            const updateAlert = document.getElementById('updateAlert');
            const countdownBarUpdate = document.getElementById('countdownBarUpdate');
            setupCountdown(updateAlert, countdownBarUpdate);

            const deleteAlert = document.getElementById('deleteAlert');
            const countdownBarDelete = document.getElementById('countdownBarDelete');
            setupCountdown(deleteAlert, countdownBarDelete);

            // Delete Confirmation Modal - FIXED
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteModal = document.getElementById('deleteModal');
            const hotelNameElement = document.getElementById('hotelName');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const hotelId = this.getAttribute('data-hotel-id');
                    const hotelName = this.getAttribute('data-hotel-name');

                    // Set hotel name in modal
                    hotelNameElement.textContent = hotelName;

                    // FIXED: Set form action correctly
                     deleteForm.action = `/admin/delete-hotels/${hotelId}`;

                    // Show modal
                    $(deleteModal).modal('show');
                });
            });
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

        .delete-btn {
            transition: all 0.3s ease;
        }

        .delete-btn:hover {
            transform: scale(1.05);
        }
    </style>
@endsection
