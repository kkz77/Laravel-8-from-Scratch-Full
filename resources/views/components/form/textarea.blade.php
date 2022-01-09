@props(['name'])
<textarea name="{{$name}}"
          id="{{$name}}"
          {{$attributes(['class'=>'w-full h-32 rounded-lg p-2'])}}
          placeholder="{{ucwords($name)}}"
          value="{{old('$name')}}"
          required></textarea>
<x-form.error name="{{$name}}"></x-form.error>