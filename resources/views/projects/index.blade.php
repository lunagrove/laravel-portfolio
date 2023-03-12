@props(['projects', 'category'=>false, 'tag'=>false])
<x-layout>
    <x-slot name="content">

        <div class="w-4/5 mx-auto top-8">  
            <div class="flex flex-col flex-1 dark:bg-gray-900 sm:items-center pb-4 pt-4 sm:pt-0">
                @if ($category)
                    <div class="grid grid-cols-3 w-full px-4">
                        <div class="mt-4 text-left text-lime-200">
                            <a href="/projects">← Back to Projects</a>
                        </div>
                        <div class="mt-4 mb-4 text-center">
                            <h2 class="text-xl text-lime-200 font-bold uppercase">{{ $category }} Projects</h2>
                        </div>
                    </div>
                @elseif ($tag)
                    <div class="grid grid-cols-3 w-full px-4">
                        <div class="mt-4 text-left text-lime-200">
                            <a href="/projects">← Back to Projects</a>
                        </div>
                        <div class="mt-4 mb-4 text-center">
                            <h2 class="text-xl text-lime-200 font-bold uppercase">{{ $tag }} Projects</h2>
                        </div>
                    </div>
                @else
                    <div class="mt-4 mb-4 text-center">
                        <h2 class="text-xl text-lime-200 font-bold uppercase">Projects</h2>
                    </div>
                @endif
            </div>
            <div>
                <section class="pl-12 pr-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" />
                    @endforeach
                </section>
                @if (count($projects))
                    <div class="text-xs text-indigo-600 mt-4 w-full text-right">
                        @if($projects instanceof \Illuminate\Pagination\AbstractPaginator)
                            {{-- {{ $projects->links() }} --}}
                            {{ $projects->links('',['class' => 'text-lime-200']) }}
                        @else
                            @if ($category)
                                Found {{ count($projects) }} Projects in {{ $category }}
                            @else
                                Found {{ count($projects) }} Projects in {{ $tag }}
                            @endif
                        @endif
                    </div>
                @else
                    <div>Nothing to showcase, yet.</div>
                @endif
            </div>
        </div>
       
    </x-slot>
</x-layout>

