@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4>These are your booked shows:</h4>
                    <table>
                        <thead>
                            <th>Show:</th>
                        </thead>
                        <tbody>
                        @foreach($shows as $show)
                        <td class="list-group-item">{{ $show->tourName }} at {{ $show->date }} with following safety precautions: </br>
                            <span class="font-weight-bold">{{ $show->safetyPrecautions }}</span></td>
                        @endforeach
                        </tbody>
                    </table>
                    <h4></br>These are your booked carpools:</h4>
                    <table>
                        <thead>
                        <th>Carpool-Date:</th>
                        <th>Action:</th>
                        </thead>
                        <tbody>
                        @foreach($carpools as $carpool)
                        <td class="list-group-item">{{ $carpool->departureDate }} from {{ $carpool->departureLocation }} with {{ $carpool->driverName }}</td>
                        <td>
                            <form action="{{ route('carpools.show',$carpool->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('carpools.show' ,$carpool->id) }}">Show</a>
                            </form>
                        </td>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
