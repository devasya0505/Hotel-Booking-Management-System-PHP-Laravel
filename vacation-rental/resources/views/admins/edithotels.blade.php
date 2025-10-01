@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-lg rounded">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0 font-weight-bold">
                    <i class="fas fa-edit mr-2"></i>Update Hotel
                </h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('hotels.update', $hotel->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('POST') --}}
                    
                    <!-- Hotel Name -->
                    <div class="form-group mb-4">
                        <label for="name" class="form-label font-weight-bold text-dark">Hotel Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-hotel text-warning"></i>
                                </span>
                            </div>
                            <input type="text" value="{{ $hotel->name }}" name="name" id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Enter hotel name" required />
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group mb-4">
                        <label for="description" class="form-label font-weight-bold text-dark">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" 
                                  id="description" rows="4" placeholder="Enter hotel description..." 
                                  required>{{ $hotel->description }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div class="form-group mb-4">
                        <label for="location" class="form-label font-weight-bold text-dark">Location</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-map-marker-alt text-warning"></i>
                                </span>
                            </div>
                            <input type="text" name="location" value="{{ $hotel->location }}" id="location" 
                                   class="form-control @error('location') is-invalid @enderror" 
                                   placeholder="Enter hotel location" required />
                        </div>
                        @error('location')
                            <div class="invalid-feedback d-block">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <div class="form-group mt-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block font-weight-bold py-3">
                            <i class="fas fa-save mr-2"></i>Update Hotel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection