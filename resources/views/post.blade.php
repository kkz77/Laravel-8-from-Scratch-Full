<x-layout>
    <x-slot name="content">
        <article>
            <h1>{!! $post->title !!}</h1>
            <h3><a href="#">{{$post->category->name}}</a></h3>
            <p>{!! $post->body !!}</p>
        </article>
        <a href="/">Go Back</a>
    </x-slot>
</x-layout>
