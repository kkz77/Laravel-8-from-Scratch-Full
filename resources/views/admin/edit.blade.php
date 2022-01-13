<x-setting>
    <x-slot name="form">

        <form action="/admin/posts/{{$post->id}}/update" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="items-center justify-center my-6 flex flex-col space-y-4 p-6">
                <x-form.input name="title" :value="old('title',$post->title)"></x-form.input>
                <x-form.input name="slug" :value="old('slug',$post->slug)"></x-form.input>
                <div class="flex w-full">
                    <x-form.input name="thumbnail" type="file"
                                  :value="old('thumbnail',$post->thumbnail)"></x-form.input>
                    <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" class="h-24 mr-6 rounded-lg w-32">
                </div>
                <x-form.textarea name="excerpt">{{old('excerpt',$post->excerpt)}}</x-form.textarea>
                <x-form.textarea name="body" class="h-48">{{old('body',$post->body)}}</x-form.textarea>
                <select name="category_id" id="category_id" class="h-8 rounded-lg text-center w-full">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ old('category_id',$post->category->id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-center mb-6">
                <x-submit-button class="flex w-32 rounded-full">Update</x-submit-button>
            </div>
        </form>
    </x-slot>
</x-setting>