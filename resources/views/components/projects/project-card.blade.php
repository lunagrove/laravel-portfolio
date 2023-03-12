@props(['project', 'showBody' => false])

<div class="p-6  bg-white overflow-hidden shadow">
    <div class="pb-4">
        @if ($showBody)
            <a class="text-indigo-600 text-lg font-bold">{{ $project->title }}</a>
        @else
            <a class="text-indigo-600 text-lg font-bold" href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        @endif
        
    </div>

    <div class="flex flex-1 w-full justify-between mt-6">
        @if ($showBody)
            <div class="flex flex-col">
                <div class="flex justify-center items-center pb-4">
                    @if ($project->image)
                        <div class="relative mb-8 flex justify-center items-center">
                            <img class="w-1/2 blue-border" src="{{ url('storage/'.$project->image) }}">
                        </div>
                    @else
                        <div class="relative mb-8 flex justify-center items-center">
                            <img class="w-1/2 blue-border" src="{{ asset('/images/project-placeholder.jpg') }}">
                        </div>
                    @endif
                    
                </div>
                <div class="space-y-3">{!! $project->body !!}</div>
            </div>
        @else
            <div class="w-36 h-36 p-4">
                @if ($project->thumb)
                    <img src="{{url('storage/'.$project->thumb) }}">
                @else
                    <img class="w-16 items-center" src="{{ asset('/images/thumbnail-placeholder.png') }}">
                @endif
            </div>
            <div class="w-full">{!! $project->excerpt!!}</div>
        @endif
    </div>

    <footer>
        @if ($project->category)
            <span class="text-xs">Category: <a href="/projects/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a></span>
        @endif
        @if (count($project->tags))
            <div class="text-xs">Tags:
                @foreach ($project->tags as $tag)
                    <a href="/projects/tags/{{$tag->slug}}"> {{$tag->name}}</a>
                @endforeach
            </div>
        @endif
    </footer>
</div>