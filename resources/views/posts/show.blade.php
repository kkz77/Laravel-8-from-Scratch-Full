<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{$post->created_at->diffForHumans()}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{$post->author->username}}">
                                {{$post->author->name}}
                            </a>
                        </h5>
                        <h6>Mascot at Laracasts</h6>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5"
                                      d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category='$post->category'></x-category-button>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{$post->title}}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>{{$post->body}}</p>
                </div>
            </div>
            <section class="col-start-5 col-span-8">
                <div class="flex bg-gray-200 border border-gray-300 p-6 rounded-xl space-x-4">
                    <div class="flex-shrink-0">
                        <img src="https://i.pravatar.cc/60" width="60" height="60" alt="avatar"
                             class="border border-gray-300 rounded-full">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <div>
                            <div class="font-bold">John Doe</div>
                            <div class="text-xs">Posted <span class="font-semibold">8 hours ago</span></div>
                        </div>
                        <div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias
                            consequatur
                            culpa
                            delectus et exercitationem, fuga ipsum iure labore nesciunt odit quasi rem
                            veritatis
                            voluptates.
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
</x-layout>
