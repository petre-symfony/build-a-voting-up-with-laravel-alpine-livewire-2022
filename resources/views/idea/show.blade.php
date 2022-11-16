<x-app-layout>
    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2">All Ideas (or back to chosen category with filters)</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount"/>

    @can('update', $idea)
    <livewire:edit-idea :idea="$idea"/>
    @endcan


    <livewire:delete-idea :idea="$idea"/>

    <div class="comments-container relative space-y-6 md:ml-22 my-8 mt-1 pt-4">
        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div>
                    <a href="" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4 w-full">
                    {{--<h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
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
        <div class="is-admin comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div>
                    <a href="" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                    <div class="text-center text-blue uppercase text-xxs font-bold mt-1">Admin</div>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">Status Changed to "Under Consideration"</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue">Andrea</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
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
        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div>
                    <a href="" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    {{--<h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
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
                                        absolute w-44 text-left ml-8 font-semibold bg-white
                                        shadow-dialog rounded-xl py-3
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
    </div><!-- end comments container -->
</x-app-layout>
