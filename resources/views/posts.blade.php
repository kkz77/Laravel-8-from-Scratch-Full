<x-layout>
    <x-slot name="header">
        <h1>Otwo's blog</h1>
    </x-slot>
    <x-slot name="content">
        @foreach ($posts as $post)
            <article>
                <h1><a href="/posts/{{$post->slug}}">{{ $post->title }}</a></h1>
                <h3>by <a href="/authors/{{$post->user->id}}">{{$post->user->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></h3>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </x-slot>
</x-layout>
