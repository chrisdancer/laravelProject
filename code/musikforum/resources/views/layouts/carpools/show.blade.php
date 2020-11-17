@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Carpool</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('carpools.index') }}"> Back</a>
        </div>
        @if($carpool->seatsAvailable > 0)
        <form action="{{ route('bookCarpool',$carpool->id) }}" method="POST">
            @csrf
            <button class="btn btn-info" type="submit" href="{{ route('bookCarpool',$carpool->id) }}">Book</button>
        </form>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Driver Name:</strong>
            {{ $carpool->driverName }}
        </div>
        <div class="form-group">
            <strong>Departure Location:</strong>
            {{ $carpool->departureLocation }}
        </div>
        <div class="form-group">
            <strong>Destination:</strong>
            {{ $carpool->destination }}
        </div>
        <div class="form-group">
            <strong>Show:</strong>
            {{ $carpool->show }}
        </div>
        <div class="form-group">
            <strong>Departure Time:</strong>
            {{ $carpool->departureTime }}
        </div>
        <div class="form-group">
            <strong>Departure Date:</strong>
            {{ $carpool->departureDate }}
        </div>
        <div class="form-group">
            <strong>Seats Available:</strong>
            {{ $carpool->seatsAvailable }}
        </div>
    </div>

</div>
@endsection
