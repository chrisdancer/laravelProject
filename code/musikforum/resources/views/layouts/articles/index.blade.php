@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>
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
        <th>Theme-Nr</th>
        <th>Title</th>
        <th>Text</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($articles as $article)
        @isset($relatedThemeID)
            @if($article->theme_id == $relatedThemeID)
            <tr>
                <td>{{ $article->theme_id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->text }}</td>
                <td>
                    <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                        @if (Auth::id() == $article->user_id)
                            <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                </td>
            </tr>
            @endif
        @endisset
        @empty($relatedThemeID)
            <tr>
                <td>{{ $article->theme_id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->text }}</td>
                <td>
                    <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                        @if (Auth::id() == $article->user_id)
                        <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                </td>
            </tr>
        @endempty
    @endforeach
</table>

{!! $articles->links() !!}

@endsection
