@extends('layouts.app')

@section('content')
    <div class="hero-wrap js-fullheight"
        style="margin-top: -25px; background-image: url('{{ asset('assets/images/room-1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate">
                    <h1 style="margin-left: 200px" class="subheading">My Bookings</h1>

                    {{-- <p><a href="{{ route('home') }}" class="btn btn-primary">Go Home</a></p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Check In Date</th>
                    <th scope="col">Check Out Date</th>
                    <th scope="col">Days</th>
                    <th scope="col">Price</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($bookings as $booking)
                    <tr>
                        <th scope="row">{{ $booking->name }}</th>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->phone_number }}</td>
                        <td>{{ $booking->check_in }}</td>
                        <td>{{ $booking->check_out }}</td>
                        <td>{{ $booking->days }}</td>
                        <td>{{ $booking->price }}</td>
                        <td>{{ $booking->room_name }}</td>
                        <td>{{ $booking->hotel_name }}</td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
