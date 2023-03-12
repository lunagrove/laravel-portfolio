<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stephanie Holmes</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{asset('/styles/main.css')}}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        
    </head>
    <body class="antialiased flex flex-col flex-grow min-h-screen">
        <x-header/>
        @if (session()->has('success'))
            <div class="flex justify-center items-center relative z-10 mb-5">
                <p class="text-xs text-white font-normal uppercase border border-white px-4 py-2 absolute top-0">
                    {{ session()->get('success')}}
                </p>
            </div>
        @elseif (session()->has('error'))
            <div class="flex justify-center items-center relative z-10">
                <p class="text-xs text-white font-normal uppercase border border-red-700 px-4 py-2 absolute top-0">
                    {{ session()->get('error') }}
                </p>
            </div>
        @endif
        <main class="flex flex-col flex-1 flex-grow">
            {{ $content }}
        </main>
        <x-footer/>
    </body>
</html>