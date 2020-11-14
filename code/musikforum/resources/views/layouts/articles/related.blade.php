@extends('layouts.app')

@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('themes.index') }}"> Back</a>
</div>

<div class="pull-right">
    <a class="btn btn-success" href="{{ route('articles.create' ,$relatedThemeID) }}"> Comment</a>
</div>
<table class="table table-bordered">
    <tr>
        <th>Theme-Name</th>
        <th>Title</th>
        <th>Text</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($articles as $article)
    @if($article->theme_id == $relatedThemeID)
    <tr>
        <td>{{ $article->theme->name }}</td>
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
    @endforeach
</table>
@endsection
