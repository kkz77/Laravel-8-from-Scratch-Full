<x-layout>
    <div class="border border-gray-200 bg-gray-100 max-w-lg mt-10 mx-auto rounded-lg">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class="text-xl font-semibold text-center mt-4">Create Post</div>
            <div class="items-center justify-center mx-auto my-6 w-72 flex flex-col space-y-4">
                <x-form.input name="title"></x-form.input>
                <x-form.input name="slug"></x-form.input>
                <x-form.input name="thumbnail" type="file"></x-form.input>
                <x-form.textarea name="excerpt"></x-form.textarea>
                <x-form.textarea name="body" class="h-48"></x-form.textarea>
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