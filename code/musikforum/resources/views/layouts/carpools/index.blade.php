@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('carpools.create') }}"> Create New Carpool</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Driver Name:</th>
        <th>Departure Location:</th>
        <th>Destination:</th>
        <th>Show:</th>
        <th>Departure Time:</th>
        <th>Departure Date:</th>
        <th>Seats Available:</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($carpools as $carpool)
    <tr>
        <td>{{ $carpool->driverName }}</td>
        <td>{{ $carpool->departureLocation }}</td>
        <td>{{ $carpool->destination }}</td>
        <td>{{ $carpool->show }}</td>
        <td>{{ $carpool->departureTime }}</td>
        <td>{{ $carpool->departureDate }}</td>
        <td>{{ $carpool->seatsAvailable }}</td>
        <td>
            <form action="{{ route('carpools.destroy',$carpool->id) }}" method="POST">
                @if ($carpool->seatsAvailable != 0)
                    <a class="btn btn-info" href="{{ route('carpools.show' ,$carpool->id) }}">Show</a>
                @else
                    Booked
                @endif

                @if (Auth::id() == $carpool->user_id)
                <a class="btn btn-primary" href="{{ route('carpools.edit',$carpool->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                @endif
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $carpools->links() !!}

@endsection
