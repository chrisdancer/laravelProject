@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Username</th>
        <th scope="col">Image</th>
    </tr>
    </thead>
    <tbody>
    @foreach($currentPageData as $key => $data)
    <tr>
        <td>{{$data->userNr}}</td>
        <td>{{$data->image}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
