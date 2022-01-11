<x-layout>
    <x-panel>
        <div class="p-4">
            <p class="text-lg text-center font-bold mb-2">LogIn</p>
            <form action="/login" method="POST" class="mx-auto flex flex-col space-y-4 w-3/12">
                @csrf
               <x-form.input name="email"></x-form.input>
               <x-form.input name="password" type="password"></x-form.input>
               <x-submit-button>Submit</x-submit-button>
            </form>
        </div>
    </x-panel>
</x-layout>