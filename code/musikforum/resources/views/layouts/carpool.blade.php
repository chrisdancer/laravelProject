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
        <th width="280px">Action</th>
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
        <td>
            <form action="{{ route('carpool.destroy',$carpool->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('carpool.show',$carpool->id) }}">Show</a>

                @can('edit-carpool', $carpool)
                <a class="btn btn-primary" href="{{ route('carpool.edit',$carpool->id) }}">Edit</a>
                @endcan

                @csrf
                @method('DELETE')
                @can('edit-carpool', $carpool)
                <button type="submit" class="btn btn-danger">Delete</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
