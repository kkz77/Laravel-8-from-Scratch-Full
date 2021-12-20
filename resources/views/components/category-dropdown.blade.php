<x-dropdown>
    <x-slot name="trigger">
        <button @click="open = !open"
                class="flex font-semibold w-32 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm text-left">
            {{isset($currentCategory)? $currentCategory->name: 'Categories'}}
            <x-icon name="dropdown"></x-icon>
        </button>
    </x-slot>
    <x-dropdown-item href="/?{{http_build_query(request()->except('category','page'))}}" :active="request()->routeIs('home')">All</x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
                href="/?category={{$category->slug}}&{{http_build_query(request()->except('category','page'))}}"
                :active="request()->is('?category='.$category->slug)">
            {{$category->name}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>