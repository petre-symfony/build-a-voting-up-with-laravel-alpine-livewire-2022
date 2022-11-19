<div class="comment-container relative bg-white rounded-xl flex transition duration-500 ease-in mt-4">
    <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
        <div>
            <a href="" class="flex-none">
                <img src="{{ $comment->user->getAvatar() }}" alt="avatar" class="h-14 w-14 rounded-xl">
            </a>
        </div>
        <div class="md:mx-4 w-full">
            {{--<h4 class="text-xl font-semibold">
                <a href="" class="hover:underline">A random title can go here</a>
            </h4> --}}
            <div class="text-gray-600">
                {{ $comment->body }}
            </div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div class="font-bold text-gray-900">{{ $comment->user->name }}</div>
                    <div>&bull;</div>
                    @if ($comment->user->id === $ideaUserId)
                        <div class="rounded-full bg-gray-100 border px-3 py-1">OP</div>
                        <div>&bull;</div>
                    @endif
                    <div>{{ $comment->created_at->diffForHumans() }}</div>
                </div>
                <div
                    x-data = "{ isOpen: false}"
                    class="flex items-center space-x-2"
                >
                    <div class="relative">
                        <button
                            @click="isOpen = !isOpen"
                            class="
                                relative bg-gray-100 hover:bg-gray-200 border transition
                                duration-150 ease-in rounded-full h-7 py-2 px-4
                            "
                        >
                            <svg class="text-gray-400 h-full scale-150" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>

                        </button>
                        <ul
                            x-cloak
                            x-show="isOpen"
                            x-transition.origin.top.left.duration.150ms
                            @click.away="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            class="
                                absolute w-44 text-left ml-8 font-semibold
                                bg-white shadow-dialog rounded-xl py-3
                                md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10
                            "
                        >
                            <li><a href="" class="hover:bg-gray-100 block px-5 py-3">Mark as spam</a></li>
                            <li><a href="" class="hover:bg-gray-100 block px-5 py-3">Delete Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end comment container -->
