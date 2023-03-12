<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <x-header/>
        <div class="flex flex-col gap-y-8 mt-8 min-h-screen place-items-center">
            <div class="w-64 h-64 rounded-full ring-2 ring-violet-900">
                <img class="w-64 h-64 rounded-full object-contain" src="{{ asset('Steph.png') }}" alt="Headshot of Stephanie Holmes">
            </div>
            <h2 class="text-5xl text-lime-200">Welcome...</h2>
            <div class="max-w-lg">
                <p class="text-center text-2xl mb-5">...to my personal portfolio website</p>
                <p class="mb-5">Here I showcase my work by means of a gallery of projects,
                   developed with a variety of languages and frameworks.</p>
               <p>Click "PROJECTS" to get started.</p>
            </div>
        </div>
        <x-footer/>
    </body>
</html>
