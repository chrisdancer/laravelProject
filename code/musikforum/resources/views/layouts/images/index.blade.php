@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('images.create') }}"> Create New Image</a>
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
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($images as $image)
    <tr>
        <td>{{ $image->name }}</td>
        <td>{{ $image->description }}</td>
        <td>{{ $image->image }}</td>
        <td>
            <form action="{{ route('images.destroy',$theme->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('images.show' ,$theme->id) }}">Show</a>
                <a class="btn btn-success" href="{{ route('createComment', $theme->id) }}"> Comment</a>
                @if (Auth::id() == $image->user_id)
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                @endif
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $images->links() !!}

@endsection
