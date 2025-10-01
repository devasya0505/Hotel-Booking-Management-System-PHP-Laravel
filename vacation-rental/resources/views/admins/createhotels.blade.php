@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 font-weight-bold">
                        <i class="fas fa-plus-circle mr-2"></i>Create New Hotel
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Hotel Name -->
                        <div class="form-group mb-4">
                            <label for="name" class="form-label font-weight-bold text-dark">Hotel Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-hotel text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter hotel name"/>
                            </div>
                        </div>
                        @if ($errors->has('name'))
                            <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                        @endif

                        <!-- Hotel Image -->
                        <div class="form-group mb-4">
                            <label for="image" class="form-label font-weight-bold text-dark">Hotel Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input"  />
                                <label class="custom-file-label" for="image">Choose image file...</label>
                            </div>
                            <small class="form-text text-muted">Recommended size: 800x600px</small>
                        </div>
                        @if ($errors->has('image'))
                            <p class="alert alert-danger">{{ $errors->first('image') }}</p>
                        @endif

                        <!-- Description -->
                        <div class="form-group mb-4">
                            <label for="description" class="form-label font-weight-bold text-dark">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4"
                                placeholder="Enter hotel description..." ></textarea>
                        </div>
                        @if ($errors->has('description'))
                            <p class="alert alert-danger">{{ $errors->first('description') }}</p>
                        @endif

                        <!-- Location -->
                        <div class="form-group mb-4">
                            <label for="location" class="form-label font-weight-bold text-dark">Location</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" name="location" id="location" class="form-control"
                                    placeholder="Enter hotel location"  />
                            </div>
                        </div>
                        @if ($errors->has('location'))
                            <p class="alert alert-danger">{{ $errors->first('location') }}</p>
                        @endif

                        <!-- Submit button -->
                        <div class="form-group mt-4">
                            <button type="submit" name="submit"
                                class="btn btn-primary btn-lg btn-block font-weight-bold py-3">
                                <i class="fas fa-save mr-2"></i>Create Hotel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        /* Simple border-only hover */
        .custom-file:hover .custom-file-label {
            border-color: #007bff !important;
            cursor: pointer;
        }

        .custom-file-input:focus~.custom-file-label {
            border-color: #007bff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
        }

        /* Ensure file name is always visible */
        .custom-file-label {
            color: #495057 !important;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>

    <!-- Add Bootstrap Custom File Input JS -->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input@1.3.4/dist/bs-custom-file-input.min.js"></script>
    <script>
        // Initialize Bootstrap custom file input
        document.addEventListener('DOMContentLoaded', function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
