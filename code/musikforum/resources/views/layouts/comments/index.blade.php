@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('comments.create') }}"> Create New Comment</a>
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
        <th>Comment</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($comments as $comment)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $comment->comment }}</td>
        <td>
            <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('relatedArticles' ,$comment->id) }}">Show</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $comments->links() !!}

@endsection
