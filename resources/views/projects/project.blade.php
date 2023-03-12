<x-layout>
    <x-slot name="content">

        <div class="w-4/5 mx-auto top-8">
        
            <div class="flex flex-col flex-1">
                <div class="py-5 text-left px-5 text-lime-200">
                    <?php $path = parse_url(url()->previous(), PHP_URL_PATH); ?>
                    @if ($path === "/")
                        <a href="/projects">← Back to Projects</a>
                    @else
                        <a href="{{ url()->previous() }}">← Back to Projects</a>
                    @endif
                </div>
                <div class="flex justify-center mb-10">
                    <div class="max-w-screen-lg  bg-lime-200 dark:bg-gray-900">

                        <x-projects.project-card :project="$project" :showBody="true"/>

                    </div>
                </div>
            </div>

        </div>
    </x-slot>
</x-layout>

