@props(['name','type'=>'text'])
<input type="{{$type}}"
       name="{{$name}}"
       class="h-10 p-2 rounded-lg w-full"
       placeholder="{{$name}}"
       value="{{old($name)}}"
>
<x-form.error name="{{$name}}"></x-form.error>

