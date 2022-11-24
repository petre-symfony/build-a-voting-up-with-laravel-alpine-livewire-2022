<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laracasts voting</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] { display: none; }
        </style>
        @livewireStyles
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="#"><img src="{{ asset('img/logo.svg') }}" alt="logo"/></a>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <div class="flex items-center space-x-4">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{route('logout') }}"
                                       onclick="event.preventDefault(); this.closest('form').submit();"
                                    >
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                                <div class="relative">
                                    <button>
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-gray-400">
                                            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
                                        </svg>
                                        <div
                                            class="
                                                absolute rounded-full bg-red text-white text-xxs w-6 h-6
                                                flex justify-center items-center border-2
                                            "
                                            style="top: -6px; right: -6px"
                                        >8</div>
                                    </button>
                                    <ul
                                        {{--x-cloak --}}
                                        x-show="isOpen"
                                        x-transition.origin.top.left.duration.150ms
                                        @click.away="isOpen=false"
                                        @keydown.escape.window="isOpen = false"
                                        class="
                                            absolute w-76 md:w-96 text-left text-sm ml-8 bg-white
                                            shadow-dialog rounded-xl py-3 z-10 max-h-128 overflow-y-auto
                                        "
                                        style="right: -46px"
                                    >
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div class="line-clamp-6">
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto doloremque fugit laudantium nostrum nulla quidem quisquam quos recusandae voluptate."</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                                @click.prevent="
                                                    isOpen = false
                                                "
                                            >
                                                <img src="https://www.gravatar.com/avatar/c6ad550c8f30082474d1e58d20f67b3a"
                                                     class="rounded-xl w-10 h-10" alt="">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">drehsem</span>
                                                        commented on
                                                        <span class="font-semibold">This is my idea</span>:
                                                        <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, suscipit?"</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="border-t border-gray-300 text-center">
                                            <a
                                                href="#"
                                                class="flex hover:bg-gray-100 px-5 py-3"
                                            >
                                                Mark all as red
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="">
                    <img
                        src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp"
                        alt="avatar" class="w-10 h-10 rounded-full"
                    >
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex flex-col md:flex-row">
            <div class="mx-auto md:mx-0 w-70 md:mr-5">
                <div
                    class="border-2 md:sticky md:top-8 border-blue rounded-xl mt-16 bg-white"
                    style="
                        border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                        border-image-slice: 1;
                        background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                        background-origin: border-box;
                        background-clip: content-box, border-box;
                    "
                >
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add an idea</h3>

                        <p class="text-xs mt-4">
                            @auth
                                Let us know what you would like and we'll take a look over!
                            @else
                                Please login to create an idea
                            @endauth
                        </p>
                    </div>
                    @auth
                        <livewire:create-idea />
                    @else
                        <div class="my-6 text-center">
                            <a
                                href="{{ route('login') }}"
                                class="inline-block justify-center w-1/2 h-11
                                    text-xs text-white bg-blue font-semibold rounded-xl
                                    border border-blue hover:bg-blue-hover
                                    transition duration-150 ease-in px-6 py-3
                                "
                            >
                                Login
                            </a>

                            <a
                                href="{{ route('register') }}"
                                class="inline-block justify-center w-1/2 h-11
                                    text-xs bg-gray-200 font-semibold rounded-xl
                                    border border-gray-200 hover:border-gray-400
                                    transition duration-150 ease-in px-6 py-3 mt-4
                                "
                            >
                                Sign Up
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="w-full px-2 md:px-0 md:w-175">
                <livewire:status-filters />

                <div class="mt-8">{{ $slot }}</div>
            </div>
        </main>
        <!-- @stack('modals') -->
        @if (session('success_message'))
            <x-notification-success
                redirect="true"
                message-to-display="{{ session('success_message') }}"
            />
        @endif
        @livewireScripts
    </body>
</html>
