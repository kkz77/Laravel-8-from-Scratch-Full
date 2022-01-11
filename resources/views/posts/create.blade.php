<x-setting>
    <x-slot name="form">
        <form action="/admin/posts" method="post" enctype="multipart/form-data" class="w-full mx-auto">
            @csrf
            <div class="items-center justify-center my-6 flex flex-col space-y-4 p-6">
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
            </div>
            <div class="flex justify-center mb-6">
                <x-submit-button class="flex w-32 rounded-full">Post</x-submit-button>
            </div>
        </form>
    </x-slot>
</x-setting>
