<x-layout>
    <x-slot name="content">
        <article>
            <h1>{!! $post->title !!}</h1>
            <h3>by
                <a href="/authors/{{$post->user->id}}">
                    {{$post->user->name}}
                </a>
                in
                <a href="/categories/{{$post->category->slug}}">
                    {{$post->category->name}}
                </a>
            </h3>
            <p>{!! $post->body !!}</p>
        </article>
        <a href="/">Go Back</a>
    </x-slot>
</x-layout>
