@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Artist</th>
            <th scope="col">Location</th>
            <th scope="col">Tourname</th>
            <th scope="col">Start</th>
            <th scope="col">Date</th>
            <th scope="col">Price</th>
            <th scope="col">Safety Precautions</th>
            <th scope="col">Cancelled</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($currentPageData as $key => $data)
                <tr>
                    <td>{{$data->artist_id}}</td>
                    <td>{{$data->location_id}}</td>
                    <td>{{$data->tourName}}</td>
                    <td>{{$data->start}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->safetyPrecautions}}</td>
                    <td>{{ $data->cancelled == 0 ? "no" : "yes" }}</td>
                    <td>
                        <form action="{{ route('bookShow',$data->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-info" type="submit" href="{{ route('bookShow',$data->id) }}">Book</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
