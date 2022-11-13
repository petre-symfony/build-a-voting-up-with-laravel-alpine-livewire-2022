<div
    x-data
    @click="const target = $event.target.tagName.toLowerCase()
                const ignores = ['button', 'svg', 'path', 'a']

                if (!ignores.includes(target)) {
                    $event.target.closest('.idea-container').querySelector('.idea-link').click()
                }
            "
    class="
                idea-container hover:shadow-card transition duration-150 ease-in bg-white
                rounded-xl flex cursor-pointer
            "
>
    <div class="hidden md:block border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
        </div>
        <div class="mt-8">
            <button
                class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400
                            transition duration-150 ease-in
                            font-bold text-xs uppercase rounded-xl px-4 py-3
                        "
            >
                Vote
            </button>
        </div>
    </div>
    <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
        <div class="mx-2 md:mx-0">
            <a href="{{ route('idea.show', $idea) }}" class="flex-none idea-link">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="h-14 w-14 rounded-xl">
            </a>
        </div>
        <div class="mx-2 md:mx-4 w-full flex flex-col justify-between">
            <h4 class="text-xl font-semibold mt-2 md:mt-0">
                <a href="" class="hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{ $idea->description }}
            </div>
            <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div>{{ $idea->created_at->diffforHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Comments</div>
                </div>
                <div
                    x-data = "{ isOpen: false}"
                    class="flex items-center space-x-2 mt-4 md:mt-0"
                >
                    <div
                        class="{{ $idea->status->classes }}  text-xxs font-bold uppercase
                                    leading-none rounded-full text-center w-28
                                    h-7 py-2 px-4
                                "
                    >
                        {{ $idea->status->name }}
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
                            @click.away="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            class="
                                        absolute w-44 text-left ml-8  font-semibold bg-white
                                        shadow-dialog rounded-xl py-3
                                        md:ml-8 top-8 md:top-6 right-0 md:left-0
                                    "
                        >
                            <li><a href="" class="hover:bg-gray-100 block px-5 py-3">Mark as spam</a></li>
                            <li><a href="" class="hover:bg-gray-100 block px-5 py-3">Delete Post</a></li>
                        </ul>
                    </button>
                </div>
                <div class="flex items-center md:hidden mt-4 md:mt-0">
                    <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                        <div class="text-sm font-bold leading-none @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
                        <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                    </div>
                    <button
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400
                                    transition duration-150 ease-in font-bold text-xxs text-white uppercase
                                    rounded-xl px-4 py-3 -mx-5
                                "
                    >Vote</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- end idea-container -->
