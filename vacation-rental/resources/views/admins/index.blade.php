@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-primary shadow-sm h-100 rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 font-weight-bold">
                        <i class="fas fa-hotel mr-2"></i>Hotels
                    </h5>
                </div>
                <div class="card-body text-center">
                    <h2 class="display-4 text-primary font-weight-bold">{{ $hotelsCount }}</h2>
                    <p class="card-text text-muted font-weight-bold">Total Hotels</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-success shadow-sm h-100 rounded">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0 font-weight-bold">
                        <i class="fas fa-door-open mr-2"></i>Rooms
                    </h5>
                </div>
                <div class="card-body text-center">
                    <h2 class="display-4 text-success font-weight-bold">{{ $roomsCount }}</h2>
                    <p class="card-text text-muted font-weight-bold">Total Rooms</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-info shadow-sm h-100 rounded">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0 font-weight-bold">
                        <i class="fas fa-users mr-2"></i>Admins
                    </h5>
                </div>
                <div class="card-body text-center">
                    <h2 class="display-4 text-info font-weight-bold">{{ $adminsCount }}</h2>
                    <p class="card-text text-muted font-weight-bold">Total Admins</p>
                </div>
            </div>
        </div>
    </div>
@endsection
