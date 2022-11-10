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

        <main class="container mx-auto max-w-custom flex>
            <div style="max-width: 280px; margin-right: 20px">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias
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
            <div style="max-width: 700px;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias
                dolorum ex exercitationem inventore ipsa laborum maiores nobis
                numquam, repellendus sed similique tempore veniam vero? Aliquam
                consectetur dolorum ex, exercitationem explicabo, hic incidunt
                maxime molestias mollitia nam neque nisi obcaecati rem totam
                voluptatem! Dolore excepturi iste itaque odio quae totam veritatis,
                vitae voluptatum! Atque exercitationem perspiciatis provident quas
                repellat repudiandae soluta tenetur voluptas. Et labore, maiores.
                Aspernatur culpa dolore eos, explicabo iste mollitia praesentium
                provident repellat, rerum sequi sit tenetur ullam unde. Assumenda
                deleniti earum, neque odio reiciendis suscipit. Adipisci placeat,
                sapiente. A aliquam amet, architecto at beatae cum dolorem doloremque
                est ex expedita explicabo fugit incidunt ipsum itaque laudantium minus,
                nisi nobis praesentium, qui quidem reiciendis repellendus reprehenderit
                repudiandae sequi tempore temporibus ut! Accusantium ad assumenda autem
                consectetur consequatur debitis deleniti dignissimos dolores doloribus
                eaque eius eligendi, et id modi non officiis provident qui recusandae
                repellendus sapiente sed temporibus unde voluptatum. Adipisci animi
                architecto distinctio ducimus earum eligendi enim fuga fugiat ipsum
                itaque iure libero, modi molestiae nam nisi praesentium quas reprehenderit
                sequi ullam veniam? Asperiores maxime, optio placeat quod repellat
                repellendus rerum saepe soluta voluptas voluptate. Asperiores aut,
                autem eum excepturi illum itaque modi numquam recusandae sequi
                voluptatibus. A.
            </div>
        </main>
    </body>
</html>
