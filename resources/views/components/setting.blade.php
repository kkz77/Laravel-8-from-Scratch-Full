<x-layout>
    <x-panel>
        <div class="flex">
            <aside class="w-72 rounded-lg bg-gray-50 shadow-md">
                <ul class="py-8 flex flex-col space-y-8 font-semibold text-gray-400">
                    <li><a href="/admin/dashboard"
                           class="hover:text-black flex justify-center  {{ request()->routeIs('dashboard') ? 'text-black border-b border-white':''}}">Dashboard</a>
                    </li>
                    <li><a href="/admin/posts/create"
                           class="hover:text-black flex justify-center  {{ request()->routeIs('create-posts') ? 'text-black border-b border-white':''}}">Create
                                                                                                                                                         Post</a>
                    </li>
                </ul>
            </aside>
            <div class="flex-1">
                @if(isset($form))
                    <h1 class="text-xl font-semibold text-center mt-4">Create Post</h1>
                    {{$form}}
                @endif
                {{$dashboard??''}}
            </div>
        </div>
    </x-panel>
</x-layout>