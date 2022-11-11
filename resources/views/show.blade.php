<x-app-layout>
    <div>
        <a href="" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2">All Ideas</span>
        </a>
    </div>
    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div>
                <a href="" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="h-14 w-14 rounded-xl">
                </a>
            </div>
            <div class="mx-4 w-full">
                <h4 class="text-xl font-semibold">
                    <a href="" class="hover:underline">A random title can go here</a>
                </h4>
                <div class="text-gray-600 mt-3">
                    Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Amet architecto, blanditiis commodi cumque cupiditate
                    error eveniet ex excepturi expedita incidunt iure iusto natus nihil, non
                    nostrum nulla odio odit omnis placeat, quasi qui quis quisquam quos saepe
                    sint ullam unde.
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">John Doe</div>
                        <div>&bull;</div>
                        <div>10 hours ago</div>
                        <div>&bull;</div>
                        <div>Category 1</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>
                    <div
                        x-data = "{ isOpen: false}"
                        class="flex items-center space-x-2"
                    >
                        <div
                            class="bg-gray-200 text-xxs font-bold uppercase
                                leading-none rounded-full text-center w-28
                                h-7 py-2 px-4
                            "
                        >
                            Open
                        </div>
                        <button
                            @click="isOpen = !isOpen"
                            class="
                                relative bg-gray-100 hover:bg-gray-200 border transition duration-150
                                ease-in rounded-full h-7 py-2 px-4
                            "
                        >
                            <svg class="text-gray-400 h-full scale-150" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>
                            <ul
                                x-cloak
                                x-show="isOpen"
                                x-transition.origin.top.left.duration.150ms
                                @click.away="isOpen=false"
                                @keydown.escape.window="isOpen = false"
                                class="
                                    absolute w-44 text-left ml-8 font-semibold bg-white
                                    shadow-dialog rounded-xl py-3
                                "
                            >
                                <li><a href="" class="hover:bg-gray-100 block px-5 py-3">Mark as spam</a></li>
                                <li><a href="" class="hover:bg-gray-100 block px-5 py-3">Delete Post</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end idea-container -->
    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex items-center space-x-4 ml-6">
            <div
                x-data = "{ isOpen: false}"
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center h-11 w-32
                        text-xs text-white bg-blue font-semibold rounded-xl
                        border border-blue hover:bg-blue-hover
                        transition duration-150 ease-in px-6 py-3
                    "
                >
                    <span class="ml-1">Reply</span>
                </button>
                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition.origin.top.left.duration.150ms
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="
                        absolute z-10 w-104 text-left font-semibold text-sm bg-white
                        shadow-dialog rounded-xl mt-5
                    "
                >
                    <form action="" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea
                                name="post_comment" id="post_comment" cols="10" rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                                placeholder="Go ahead, don't be shy, share your thoughts..."
                            ></textarea>

                            <div class="flex items-center space-x-3">
                                <button
                                    type="button"
                                    class="flex items-center justify-center h-11 w-1/2
                                        text-sm text-white bg-blue font-semibold rounded-xl
                                        border border-blue hover:bg-blue-hover
                                        transition duration-150 ease-in px-6 py-3
                                    "
                                >
                                    Post Comment
                                </button>
                                <button
                                    type="button"
                                    class="flex items-center justify-center w-32 h-11
                                    text-xs bg-gray-200 font-semibold rounded-xl
                                    border border-gray-200 hover:border-gray-400
                                    transition duration-150 ease-in px-6 py-3
                                "
                                >
                                    <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div
                x-data = "{ isOpen: false}"
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center h-11 w-36
                        text-sm bg-gray-200 font-semibold rounded-xl
                        border border-gray-200 hover:border-gray-400
                        transition duration-150 ease-in px-6 py-3
                    "
                >
                    <span>Set Status</span>
                    <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition.origin.top.left.duration.150ms
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="
                        absolute z-20 w-76 text-left font-semibold text-sm bg-white
                        shadow-dialog rounded-xl mt-5
                    "
                >
                    <form action="" class="space-y-4 px-4 py-6">
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input class="bg-gray-200 text-black" type="radio" checked="" name="radio-direct" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input class="bg-gray-200 text-purple" type="radio" name="radio-direct" value="2">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input class="bg-gray-200 text-yellow" type="radio" name="radio-direct" value="3">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input class="bg-gray-200 text-green" type="radio" name="radio-direct" value="3">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input class="bg-gray-200 text-red" type="radio" name="radio-direct" value="3">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <textarea
                                name="update_comment" id="update_comment" cols="30" rows="3"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                                placeholder="Add an update comment (optional)"
                            ></textarea>
                        </div>

                        <div class="flex items-center justify-between space-x-3">
                            <button
                                type="button"
                                class="flex items-center justify-center w-1/2 h-11
                                    text-xs bg-gray-200 font-semibold rounded-xl
                                    border border-gray-200 hover:border-gray-400
                                    transition duration-150 ease-in px-6 py-3
                                "
                            >
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>

                            <button
                                type="submit"
                                class="flex items-center justify-center w-1/2 h-11
                                    text-xs text-white bg-blue font-semibold rounded-xl
                                    border border-blue hover:bg-blue-hover
                                    transition duration-150 ease-in px-6 py-3
                                "
                            >
                                <span class="ml-1">update</span>
                            </button>
                        </div>

                        <div>
                            <label class="font-normal inline-flex items-center">
                                <input class="rounded bg-gray-200" type="checkbox" name="notify_voters" checked="">
                                <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>

            <button
                type="button"
                class="h-11 w-32 uppercase
                    text-xs bg-gray-200 font-semibold rounded-xl
                    border border-gray-200 hover:border-gray-400
                    transition duration-150 ease-in px-6 py-3
                "
            >
                <span>Vote</span>
            </button>
        </div>
    </div><!-- end buttons-container -->


    <div class="comments-container relative space-y-6 ml-22 my-8 mt-1 pt-4">
        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div>
                    <a href="" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="h-14 w-14 rounded-xl">
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
                            </button>
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
                            </button>
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
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end comment container -->
    </div><!-- end comments container -->
</x-app-layout>
