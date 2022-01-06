<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<body style="font-family: Open Sans, sans-serif; scroll-behavior: smooth">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex">
                @auth
                    <div class="flex items-center font-semibold space-x-6">
                        <p class="bg-green-500 rounded-3xl px-4 py-2 text-white">Welcome , {{auth()->user()->name}}</p>
                        <form action="/logout" method="POST" class="flex">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="flex items-center space-x-6">
                        <a href="/login" class="text-sm font-bold uppercase flex items-center">LogIn</a>
                        <a href="/register" class="text-sm font-bold uppercase flex items-center">Register</a>
                    </div>
                @endauth
                <a href="#newsletter"
                   class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" id="newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address" name="email"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none" required>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
                @error('email')
                <p class="bg-gray-50 font-semibold mt-3 p-2 rounded text-red-500 text-xs">{{$message}}</p>
                @enderror
            </div>
        </footer>
    </section>
</body>
