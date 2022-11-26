<div
    x-data="{isOpen: false}"
    class="relative"
>
    <button
        @click="
            isOpen = !isOpen
            if (isOpen) {
                livewire.emit('getNotifications')
            }
        "
    >
        <svg viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-gray-400">
            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
        </svg>
        @if($notificationCount)
            <div
                class="
                    absolute rounded-full bg-red text-white text-xxs w-6 h-6
                    flex justify-center items-center border-2
                    -top-1 -right-1
                "
            >{{ $notificationCount }}</div>
        @endif
    </button>
    <ul
        x-cloak
        x-show="isOpen"
        x-transition.origin.top
        @click.away="isOpen=false"
        @keydown.escape.window="isOpen = false"
        class="
            absolute w-76 md:w-96 text-left text-sm ml-8 bg-white
            shadow-dialog rounded-xl z-10 max-h-128 overflow-y-auto
            -right-28 md:-right-12
        "
    >
        @if($notifications->isNotEmpty())
            @foreach($notifications as $notification)
                <li>
                    <a
                        href="{{ route('idea.show', $notification->data['idea_slug']) }}"
                        class="flex hover:bg-gray-100 px-5 py-3"
                        {{--@click.prevent="isOpen = false" --}}
                    >
                        <img src="{{ $notification->data['user_avatar'] }}"
                             class="rounded-xl w-10 h-10" alt="">
                        <div class="ml-4">
                            <div class="line-clamp-6">
                                <span class="font-semibold">{{ $notification->data['user_name'] }}</span>
                                commented on
                                <span class="font-semibold">{{ $notification->data['idea_title'] }}</span>:
                                <span>{{ $notification->data['comment_body'] }}</span>
                            </div>
                            <div class="text-xs text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                </li>
            @endforeach
            <li class="border-t border-gray-300 text-center">
                <button
                    href="#"
                    class="w-full font-semibold hover:bg-gray-100 px-5 py-4"
                >
                    Mark All as Read
                </button>
            </li>
        @else
            <li class="mx-auto w-40 py-6">
                <img src="{{ asset('img/no-ideas.svg') }}" alt="No ideas" class="mx-auto" style="mix-blend-mode: luminosity">
                <div class="text-gray-400 text-center font-bold mt-6">No new notifications</div>
            </li>
        @endif
    </ul>
</div>
