@props(['active'])
@php
    $class="hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white text-left px-2";
        if(!empty($active)){
            if ($active){
                        $class.=" bg-blue-500 text-white";
                    }
            }
@endphp

<a
        {{ $attributes(['class' => $class ]) }}
        @click="open=!open"
>{{$slot}}</a>
