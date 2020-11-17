@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('themes.create') }}"> Create New Theme</a>
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
        <th>Created at</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($themes as $theme)
    <tr>
        <td>{{ $theme->created_at }}</td>
        <td>{{ $theme->name }}</td>
        <td>
            <form action="{{ route('themes.destroy',$theme->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('articles.show' ,$theme->id) }}">Show</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $themes->links() !!}

@endsection
