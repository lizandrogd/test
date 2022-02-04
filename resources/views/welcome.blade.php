<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    
    <body class="antialiased">
        <div class="">
            @if (Route::has('login'))
                <div class=" bg-gray-100  text-center p-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-500 dark:text-gray-500 no-underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-500 dark:text-gray-500 no-underline">Iniciar sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500 dark:text-gray-500 no-underline">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif


        </div>
        <div class="w-full ">
            <img src="./img/welcome.svg" alt="" class="mx-auto sm:w-5/6  lg:w-3/6 ">
        </div>
    </body>
</html>
