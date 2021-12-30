@props(['comment'])
<div class="flex bg-gray-200 border border-gray-300 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" width="60" height="60" alt="avatar"
             class="border border-gray-300 rounded-full">
    </div>
    <div class="flex flex-col space-y-4">
        <div>
            <div class="font-bold">{{$comment->author->name}}</div>
            <div class="text-xs text-gray-500">Posted <span class="font-semibold">{{$comment->created_at->diffForHumans()}}</span></div>
        </div>
        <div class="leading-6">
            {{$comment->body}}
        </div>
    </div>
</div>