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
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($carpools as $carpool)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $carpool->name }}</td>
        <td>
            <form action="{{ route('carpools.destroy',$carpool->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('carpools.show' ,$carpool->id) }}">Show</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $carpools->links() !!}

@endsection
