<x-layout>
    <x-slot name="content">

        <div class="lg:flex lg:flex-row sm:block w-full h-full pl-10 mt-4 lg:mt-8 m-auto space-between gap-12 justify-center">
            
            <div class="lg:w-1/3 sm:w-1/2 xs:w-1/2 flex flex-col items-left justify-center lg:pl-8 md:pl-8 sm-mb-12">

                <div class="lg:w-60 lg:h-60 w-48 h-48 mb-8 mt-8 sm:mb-4">  
                    <img src="{{ asset('/images/Steph-profile-pic.jpg') }}" alt="Headshot of Stephanie Holmes">
                </div>

                <h4 class="lg:text-3xl text-3xl mb-6 mt-8 text-lime-200">Stephanie Holmes</h4>  
                <h2 class="home-page-text text-lime-200 lg:text-5xl text-4xl">Web Developer</h2>
                <h2 class="home-page-text text-lime-200 lg:text-5xl text-4xl mb-8">Full Stack</h2>
            </div>
        
            <div class="lg:w-1/3 w-3/4 m-auto mt-8 mb-8">
                    
                <a href="/projects/movie-mania"><img width="600" height="300" class="w-full" src="{{ asset('/images/movie-mania-cropped.png') }}" alt="Movie Mania project"></a>
                <a href="/projects/movie-mania" class="text-lime-200">Click to take a closer look</a>
                    
            </div>

            <div class="lg:w-1/3 w-full flex flex-col lg:text-indigo-600 text-lime-200">
                <a href="/projects"><p class="font-bold ml-4 mb-1 sm:mt-4">Other Projects</p></a>
                <ul class="list-none ml-9 mb-4">
                    @foreach ($projects as $project)
                        <li class="relative">
                            <div class="absolute top-2 left-0 w-2 h-2 transform -translate-x-4 bg-indigo-600 rotate-45"></div>
                            <a href="/projects/{{ $project->slug }}">{{$project->title}}</a>
                        </li>
                    @endforeach
                </ul>
            
                <a href="/projects"><p class="font-bold ml-4 mb-1">Skills</p></a>
                <ul class="list-none ml-9">
                    <li class="relative">
                        <div class="absolute top-2 left-0 w-2 h-2 transform -translate-x-4 bg-indigo-600 rotate-45"></div>
                        Node.js
                    </li>
                    <li class="relative">
                        <div class="absolute top-2 left-0 w-2 h-2 transform -translate-x-4 bg-indigo-600 rotate-45"></div>
                        React
                    </li>
                    <li class="relative">
                        <div class="absolute top-2 left-0 w-2 h-2 transform -translate-x-4 bg-indigo-600 rotate-45"></div>
                        Javascript
                    </li>
                    <li class="relative">
                        <div class="absolute top-2 left-0 w-2 h-2 transform -translate-x-4 bg-indigo-600 rotate-45"></div>
                        PHP
                    </li>
                </ul>
            </div>

        </div>

    </x-slot>
</x-layout>

