<x-layout>
    <div class="border border-gray-200 bg-gray-100 max-w-lg mt-10 mx-auto rounded-lg">
        <form action="/admin/posts" method="post">
            @csrf
            <div class="text-xl font-semibold text-center mt-4">Create Post</div>
            <div class="items-center justify-center mx-auto my-6 w-72 flex flex-col space-y-4">
                <input type="text" name="title" class="h-8  p-2 rounded-lg w-full" placeholder="Title" required value="{{old('title')}}">
                <input type="text" name="slug" class="h-8  p-2 rounded-lg w-full" placeholder="Slug" required value="{{old('slug')}}">
                <textarea name="excerpt" id="excerpt" class="w-full rounded-lg p-2" placeholder="Excerpt"
                                       value="{{old('excerpt')}}"
                          required></textarea>
                <textarea name="body" id="body" class="w-full rounded-lg p-2 h-32" placeholder="Body"
                          value="{{old('body')}}"
                          required></textarea>
                <select name="category_id" id="category_id" class="h-8 rounded-lg text-center w-full">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                    @endforeach
                </select>
                <x-submit-button class="w-full rounded-full">Post</x-submit-button>
            </div>
        </form>
    </div>
</x-layout>