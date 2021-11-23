@extends('layout')
@section('header')
    <h1>Otwo's Blog</h1>
@endsection
@section('content')
    @foreach ($posts as $post)
        <article>
            <h1><a href="/posts/{{$post->slug}}">{{ $post->title }}</a></h1>
            <p>{{ $post->excerpt }}</p>
        </article>

    @endforeach
@endsection
