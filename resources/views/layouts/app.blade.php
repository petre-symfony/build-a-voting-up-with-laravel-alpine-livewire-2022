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
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
        <header class="flex items-center justify-between px-8 py-4">
            <a href=""><img src="{{ asset('img/logo.svg') }}" alt="logo"/></a>
            <div class="flex items-center">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    {{ __('Log Out') }}
                                </a>
                            </form>
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

        <main class="container mx-auto max-w-custom flex">
            <div class="w-70 mr-5">
                An idea form goes here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias
                amet architecto beatae cumque dicta illum, ipsam molestias odit,
                quae, quibusdam repudiandae tenetur velit! Cumque distinctio
                esse fugiat illum perferendis quaerat quidem, quis repellat
                repellendus similique. Ab animi aut blanditiis dolor eveniet
                explicabo, fugit harum iure mollitia necessitatibus nihil nostrum,
                quam quo quod repudiandae sint tenetur! Alias dolor et laudantium
                perspiciatis possimus, quaerat quas quasi vitae. Nemo possimus
                provident quasi rem totam. A amet aperiam, corporis ducimus eius
                minus nulla obcaecati quia repellendus soluta tempore, voluptatibus
                voluptatum! Assumenda cumque ex incidunt iste magni perspiciatis
                quia ratione vel voluptas voluptatem? Itaque, voluptatibus.
            </div>
            <div class="w-175">
                <nav class="flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="" class="border-b-4 pb-3 border-blue">All Ideas (87)</a></li>
                        <li>
                            <a
                                href=""
                                class="text-gray-400 transition duration-150
                                    ease-in border-b-4 pb-3 hover:border-blue"
                            >Considering (6)</a>
                        </li>
                        <li>
                            <a
                                href=""
                                class="text-gray-400 transition duration-150
                                    ease-in border-b-4 pb-3 hover:border-blue"
                            >In Progress (1)</a>
                        </li>
                    </ul>

                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li>
                            <a
                                href=""
                                class="text-gray-400 transition duration-150
                                    ease-in border-b-4 pb-3 hover:border-blue"
                            >Implemented (10)</a>
                        </li>
                        <li>
                            <a
                                href=""
                                class="text-gray-400 transition duration-150
                                    ease-in border-b-4 pb-3 hover:border-blue"
                            >Closed (55)</a>
                        </li>
                    </ul>
                </nav>

                <div class="mt-8">{{ $slot }}</div>
            </div>
        </main>
    </body>
</html>
