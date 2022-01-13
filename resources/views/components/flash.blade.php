@if(session()->has('success'))
    <p x-data="{ show:true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
       class="bg-blue-500 bottom-2 fixed px-4 py-2 right-2 rounded-3xl text-white">{{session('success')}}</p>
@endif
