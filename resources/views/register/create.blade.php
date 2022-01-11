<x-layout>
    <x-panel>
        <div class="p-4">
            <p class="text-lg text-center font-bold mb-2">Register</p>
            <form action="/register" method="POST" class="flex flex-col space-y-6 mx-auto w-80">
                @csrf
                <x-form.input name="name"></x-form.input>
                <x-form.input name="username"></x-form.input>
                <x-form.input name="password" type="password"></x-form.input>
                <x-form.input name="email" type="email"></x-form.input>
                <x-submit-button>Submit</x-submit-button>
            </form>
        </div>
    </x-panel>
</x-layout>