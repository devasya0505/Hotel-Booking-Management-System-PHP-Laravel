@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-lg rounded">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0 font-weight-bold">
                    <i class="fas fa-edit mr-2"></i>Update Booking Status
                </h5>
            </div>
            <div class="card-body p-4">
                <!-- Booking Summary -->
                <div class="booking-summary mb-4 p-3 border rounded">
                    <h6 class="font-weight-bold text-dark mb-3">Booking Summary</h6>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <small class="text-muted">Guest Name:</small>
                            <div class="font-weight-bold">{{ $booking->name }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <small class="text-muted">Hotel:</small>
                            <div class="font-weight-bold">{{ $booking->hotel_name }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <small class="text-muted">Room:</small>
                            <div class="font-weight-bold">{{ $booking->room_name }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <small class="text-muted">Current Status:</small>
                            <div>
                                <span class="badge 
                                    @if($booking->status == 'confirmed') badge-success
                                    @elseif($booking->status == 'pending') badge-warning
                                    @elseif($booking->status == 'cancelled') badge-danger
                                    @else badge-secondary @endif
                                    py-2 px-3">
                                    @if($booking->status == 'confirmed')
                                        <i class="fas fa-check mr-1"></i>Confirmed
                                    @elseif($booking->status == 'pending')
                                        <i class="fas fa-clock mr-1"></i>Pending
                                    @elseif($booking->status == 'cancelled')
                                        <i class="fas fa-times mr-1"></i>Cancelled
                                    @else
                                        {{ $booking->status }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('bookings.update.status', $booking->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="status" class="form-label font-weight-bold text-dark">Update Status</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-tasks text-warning"></i>
                                </span>
                            </div>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Choose New Status</option>
                                <option value="pending" @if($booking->status == 'pending') selected @endif>
                                    ⏰ Pending
                                </option>
                                <option value="confirmed" @if($booking->status == 'confirmed') selected @endif>
                                    ✅ Confirmed
                                </option>
                                <option value="cancelled" @if($booking->status == 'cancelled') selected @endif>
                                    ❌ Cancelled
                                </option>
                            </select>
                        </div>
                        <small class="form-text text-muted">Select the updated status for this booking</small>
                    </div>

                    <!-- Submit button -->
                    <div class="form-group mt-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block font-weight-bold py-3">
                            <i class="fas fa-save mr-2"></i>Update Booking Status
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



{{-- 
@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-lg rounded">
            <div class="card-header bg-warning text-white">
                <h5 class="card-title mb-0 font-weight-bold">
                    <i class="fas fa-sync-alt mr-2"></i>Update Booking Status
                </h5>
            </div>
            <div class="card-body p-4">
                <!-- Current Status Display -->
                <div class="current-status mb-4 text-center">
                    <h6 class="text-muted mb-2">Current Status</h6>
                    <span class="badge 
                        @if($booking->status == 'confirmed') badge-success
                        @elseif($booking->status == 'pending') badge-warning
                        @elseif($booking->status == 'cancelled') badge-danger
                        @else badge-secondary @endif
                        py-3 px-4" style="font-size: 1.1rem;">
                        @if($booking->status == 'confirmed')
                            <i class="fas fa-check-circle mr-2"></i>Confirmed
                        @elseif($booking->status == 'pending')
                            <i class="fas fa-clock mr-2"></i>Pending
                        @elseif($booking->status == 'cancelled')
                            <i class="fas fa-times-circle mr-2"></i>Cancelled
                        @else
                            {{ $booking->status }}
                        @endif
                    </span>
                </div>

                <!-- Booking Details -->
                <div class="booking-details mb-4 p-3 bg-light rounded">
                    <div class="row text-center">
                        <div class="col-4">
                            <small class="text-muted d-block">Guest</small>
                            <strong>{{ $booking->name }}</strong>
                        </div>
                        <div class="col-4">
                            <small class="text-muted d-block">Hotel</small>
                            <strong>{{ $booking->hotel_name }}</strong>
                        </div>
                        <div class="col-4">
                            <small class="text-muted d-block">Room</small>
                            <strong>{{ $booking->room_name }}</strong>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('bookings.update.status', $booking->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <label class="form-label font-weight-bold">Select New Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Choose Status --</option>
                            <option value="pending" @if($booking->status == 'pending') selected @endif>
                                ⏰ Pending
                            </option>
                            <option value="confirmed" @if($booking->status == 'confirmed') selected @endif>
                                ✅ Confirmed
                            </option>
                            <option value="cancelled" @if($booking->status == 'cancelled') selected @endif>
                                ❌ Cancelled
                            </option>
                        </select>
                        <small class="form-text text-muted">Update the booking status to reflect the current situation</small>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-warning btn-block btn-lg font-weight-bold">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}