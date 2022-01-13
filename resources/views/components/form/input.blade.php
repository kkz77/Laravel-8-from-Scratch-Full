@props(['name'])
<input
       name="{{$name}}"
       class="h-10 p-2 rounded-lg w-full outline-none focus:ring focus:ring-blue-500"
       placeholder="{{$name}}"
       {{$attributes(['value'=>old($name),'type'=> 'text'])}}
>
<x-form.error name="{{$name}}"></x-form.error>

