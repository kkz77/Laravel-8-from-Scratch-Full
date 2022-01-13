<x-setting>
    <x-slot name="dashboard">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Post
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Posted Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Author
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-20 w-20">
                                                <img class="h-20 w-20 rounded-lg"
                                                     src="{{asset('storage/'.$post->thumbnail)}}"
                                                     alt="">
                                            </div>
                                            <div class="ml-4 w-48">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{$post->slug}}"> {{$post->title}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$post->category->name}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{$post->created_at->diffForHumans()}}
                                    </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                                        {{$post->author->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/posts/{{$post->id}}/edit" class="bg-indigo-400 px-4 py-2 rounded-lg text-white hover:bg-indigo-900">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                        <form action="/admin/posts/{{$post->id}}/delete" method="POST">
                                           @method('DELETE')
                                            @csrf
                                           <button class="bg-red-400 px-4 py-2 rounded-lg text-white hover:bg-red-900" type="submit">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            <!-- More people... -->
                            </tbody>
                        </table>
                        <div class="p-4 bg-gray-200">
                        {{$posts->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-setting>