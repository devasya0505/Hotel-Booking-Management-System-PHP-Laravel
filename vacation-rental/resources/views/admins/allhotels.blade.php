@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Hotels</h5>
                    <a href="create-hotels.html" class="btn btn-primary mb-4 text-center float-right">Create Hotels</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">location</th>
                                <th scope="col">description </th>
                                <th scope="col">update</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                
                            <tr>
                                <th scope="row">{{ $hotel->id }} </th>
                                <td>{{ $hotel->name }}</td>
                                <td>{{ $hotel->location}}</td>
                                <td>{{ $hotel->description}}</td>

                                <td><a href="update-category.html" class="btn btn-warning text-white text-center ">Update
                                    </a></td>
                                <td><a href="delete-category.html" class="btn btn-danger  text-center ">Delete </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
