@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Carpool</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('carpools.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('carpools.update',$carpool->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DriverName:</strong>
                <input type="text" name="driverName" value="{{ $carpool->driverName }}" class="form-control" placeholder="Driver Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departure Location:</strong>
                <input type="text" name="name" value="{{ $carpool->departureLocation }}" class="form-control" placeholder="Departure Location">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Destination:</strong>
                <input type="text" name="destination" value="{{ $carpool->destination }}" class="form-control" placeholder="Destination">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Show:</strong>
                <input type="text" name="show" value="{{ $carpool->show }}" class="form-control" placeholder="Show">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departure Time:</strong>
                <input type="text" name="departureTime" value="{{ $carpool->departureTime }}" class="form-control" placeholder="Departure Time">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departure Date:</strong>
                <input type="text" name="departureDate" value="{{ $carpool->departureDate }}" class="form-control" placeholder="Departure Date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Seats Available:</strong>
                <input type="text" name="seatsAvailable" value="{{ $carpool->seatsAvailable }}" class="form-control" placeholder="Seats Available">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
