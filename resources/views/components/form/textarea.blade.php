@props(['name'])
<textarea name="{{$name}}"
          id="{{$name}}"
          {{$attributes(['class'=>'w-full h-32 rounded-lg p-2 outline-none focus:ring focus:ring-blue-500'])}}
          placeholder="{{ucwords($name)}}"
          value="{{old('$name')}}"
          required>{{$slot}}</textarea>
<x-form.error name="{{$name}}"></x-form.error>