<div class="flex flex-1 flex-col space-y-3">
    <div class="font-semibold text-lg">Want to Participate?</div>
    @auth
        <form action="/posts/{{ $post->slug }}/comments" method="POST">
            @csrf
            <textarea name="body" class="bg-gray-50 h-24 rounded-2xl w-11/12 p-4"
                      placeholder="What's your thoughts?" required></textarea>
            @error('body')
            <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
            <div class="flex justify-end pt-3 px-10">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    @else
        <p><a href="/login" class="text-blue-500">Login</a> or
            <a href="/register" class="text-blue-500">Register </a>to participate in comment
                                                            section!</p>
    @endauth
</div>