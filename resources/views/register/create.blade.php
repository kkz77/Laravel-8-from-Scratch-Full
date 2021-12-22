<x-layout>
    <main class="my-16 max-w-lg mx-auto bg-gray-100 border border-gray-200">
        <div class="p-4">
            <p class="text-lg text-center font-bold mb-2">Register</p>
            <form action="/register" method="POST" class="mx-auto w-80">
                @csrf
                <div class="items-center justify-center mx-auto my-6 w-72">
                    <input type="text" name="name" class="h-8 w-72 p-2" placeholder="Name">
                </div>
                <div class="items-center justify-center mx-auto my-6 w-72">
                    <input type="text" name="username" class="h-8 w-72 p-2" placeholder="Username">
                </div>
                <div class="items-center justify-center mx-auto my-6 w-72">
                    <input type="password" name="password" class="h-8 w-72 p-2" placeholder="Password">
                </div>
                <div class="items-center justify-center mx-auto my-6 w-72">
                    <input type="email" name="email" class="h-8 w-72 p-2" placeholder="Email">
                </div>
                <div class="flex justify-center">
                    <button class="bg-blue-500 justify-center px-4 py-2 rounded text-white">Submit</button>
                </div>
            </form>
        </div>
    </main>
</x-layout>