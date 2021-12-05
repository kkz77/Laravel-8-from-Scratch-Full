<x-layout>
    @include('_header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-post-card :post="$posts->last()" class="flex space-x-6"></x-post-card>
        <div class="lg:grid lg:grid-cols-6">
            @foreach ($posts as $post)
                <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'lg:col-span-3':'lg:col-span-2' }}">
                </x-post-card>
            @endforeach
        </div>
    </main>
</x-layout>
