@props(['trigger'])
<div id="dropdown" class="flex-1 flex flex-col relative text-sm" x-data="{open:false}">
    {{--Trigger--}}
    <div>
        {{$trigger}}
    </div>
    <div x-show="open"
         class="flex flex-col space-y-4 text-center px-2 py-2 absolute w-full bg-transparent mt-10 bg-gray-100 rounded-xl z-50 overflow-auto max-h-48 scroll">
        {{$slot}}
    </div>
</div>

