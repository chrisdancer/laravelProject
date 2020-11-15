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
                            <th>Tour-Name:</th>
                        </thead>
                        <tbody>
                        @foreach($shows as $show)
                            <td class="list-group-item">{{ $show->tourName }}</td>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
