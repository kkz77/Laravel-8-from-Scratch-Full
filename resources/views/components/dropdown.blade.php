@props(['trigger'])
<div id="app" class="flex-1 flex flex-col relative text-sm">
    {{--Trigger--}}
    <div>
       {{$trigger}}
    </div>
    <div v-show="open"
         class="flex flex-col space-y-4 text-center px-2 py-2 absolute w-full bg-transparent mt-10 bg-gray-100 rounded-xl z-50">
        {{$slot}}
    </div>
</div>
<script>
    new Vue({
        el: '#app',
        data: {
            open: false,
        },
    })
</script>
