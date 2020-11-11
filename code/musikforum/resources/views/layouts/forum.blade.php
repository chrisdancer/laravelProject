@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Timestamp</th>
                <th scope="col">User</th>
                <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($currentPageData as $key => $data)
                <tr>
                    <td>{{$data->created_at}}</td>
                    <td>{{$data->userNr}}</td>
                    <td>{{$data->message}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
