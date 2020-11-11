@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Drivername</th>
        <th scope="col">Depature from</th>
        <th scope="col">Destination</th>
        <th scope="col">Show</th>
        <th scope="col">Leaving at</th>
        <th scope="col">Leaving on</th>
        <th scope="col">Seats available</th>
        <th scope="col">Seats taken</th>
    </tr>
    </thead>
    <tbody>
    @foreach($currentPageData as $key => $data)
    <tr>
        <td>{{$data->userNr}}</td>
        <td>{{$data->departureLocationNr}}</td>
        <td>{{$data->destinationLocationNr}}</td>
        <td>{{$data->departureTime}}</td>
        <td>{{$data->departureDate}}</td>
        <td>{{$data->seatsAvailable}}</td>
        <td>{{$data->seatsTaken}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
