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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0 font-weight-bold">Admins List</h5>
                        <a href="create-admins.html" class="btn btn-primary btn-sm">
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
@endsection
