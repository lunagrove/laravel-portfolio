<x-layout>
    <x-slot name="content">

        <div class="lg:w-2/3 w-4/5 mx-auto top-8">  
            <div class="flex flex-col flex-1 dark:bg-gray-900 items-center pb-4 pt-4 sm:pt-0">
                
                <div class="mt-4 mb-4 text-center">
                    <h2 class="text-xl text-lime-200 font-bold uppercase">Admin</h2>
                </div>
                
                <section class="p-4 pl-6 pr-6 mb-8 w-full  bg-white">
                    <div class="flex w-full justify-between pb-3 pr-3">
                        <p class="font-bold text-indigo-600">Projects</p>
                        <a href="/admin/projects/create"><button class="btn bg-indigo-600 hover:bg-indigo-500 text-lime-200 h-10 w-36 p-2 rounded items-end" type="button">Create Project</button></a>
                    </div>
                    <table class="w-full">
                        @foreach ($projects as $project)
                            <tr class="odd:bg-gray-100 even:bg-white leading-7">
                                <td class="lg:w-4/5 w-2/3">
                                    <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
                                </td>
                                <td>
                                    <a href="/admin/projects/{{ $project->slug }}/edit">Edit <img class="img-no-outline no-border w-4 inline-block" src="{{ asset('/images/edit-icon.png') }}"></a>
                                </td>
                                <td class="text-red-600">
                                    <form method="POST" action="/admin/projects/{{$project->slug}}/delete" class="inline pr-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600">Delete
                                        </button>
                                    </form>
                                    <img class="img-no-outline no-border w-4 inline-block" src="{{ asset('/images/trash-icon.png') }}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </section>

                <section class="p-4 pl-6 pr-6 mb-8 w-full bg-white">
                    <div class="flex w-full justify-between pb-3 pr-3">
                        <p class="font-bold text-indigo-600">Categories</p>
                        <a href="/admin/categories/create"><button class="btn bg-indigo-600 hover:bg-indigo-500 text-lime-200 h-10 w-36 p-2 rounded items-end" type="button">Create Category</button></a>
                    </div>
                    <table class="w-full">
                        @foreach ($categories as $category)
                            <tr class="odd:bg-gray-100 even:bg-white leading-7">
                                <td class="lg:w-4/5 w-2/3">
                                    {{ $category->name }}
                                </td>
                                <td>
                                    <a href="/admin/categories/{{ $category->slug }}/edit">Edit <img class="img-no-outline no-border w-4 inline-block" src="{{ asset('/images/edit-icon.png') }}"></a>
                                </td>
                                <td class="text-red-600">
                                    <form method="POST" action="/admin/categories/{{$category->slug}}/delete" class="inline pr-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600">Delete
                                        </button>
                                    </form>
                                    <img class="img-no-outline no-border w-4 inline-block" src="{{ asset('/images/trash-icon.png') }}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </section>

                <section class="p-4 pl-6 pr-6 mb-8 w-full bg-white">
                    <div class="flex w-full justify-between pb-3 pr-3">
                        <p class="font-bold text-indigo-600">Tags</p>
                        <a href="/admin/tags/create"><button class="btn bg-indigo-600 hover:bg-indigo-500 text-lime-200 h-10 w-36 p-2 rounded items-end" type="button">Create Tag</button></a>
                    </div>
                    <table class="w-full">
                        @foreach ($tags as $tag)
                            <tr class="odd:bg-gray-100 even:bg-white leading-7">
                                <td class="lg:w-4/5 w-2/3">
                                    {{ $tag->name }}
                                </td>
                                <td>
                                    <a href="/admin/tags/{{ $tag->slug }}/edit">Edit <img class="img-no-outline no-border w-4 inline-block" src="{{ asset('/images/edit-icon.png') }}"></a>
                                </td>
                                <td class="text-red-600">
                                    <form method="POST" action="/admin/tags/{{$tag->slug}}/delete" class="inline pr-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600">Delete
                                        </button>
                                    </form>
                                    <img class="img-no-outline no-border w-4 inline-block" src="{{ asset('/images/trash-icon.png') }}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </section>

                <section class="p-4 pl-6 pr-6 mb-8 w-full bg-white">
                    <div class="flex w-full justify-between pb-3 pr-3">
                        <p class="font-bold text-indigo-600">Users</p>
                        <a href="/register"><button class="btn bg-indigo-600 hover:bg-indigo-500 text-lime-200 h-10 w-36 p-2 rounded items-end" type="button">Create User</button></a>
                    </div>
                    <table class="w-full">
                        @foreach ($users as $user)
                            <tr class="odd:bg-gray-100 even:bg-white leading-7">
                                <td class="lg:w-4/5 w-2/3">
                                    {{ $user->name }}
                                </td>
                                <td>
                                    <a href="/register/{{ $user->id }}/edit">Edit <img class="img-no-outline no-border w-4 inline-block" src="{{ asset('/images/edit-icon.png') }}"></a>
                                </td>
                                @if (!($user->isAdmin()))
                                    <td class="text-red-600">
                                        <form method="POST" action="/register/{{$user->id}}/delete" class="inline pr-0">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-600">Delete
                                            </button>
                                        </form>
                                        <img class="img-no-outline no-border w-4 inline-block" src="{{ asset('/images/trash-icon.png') }}">
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </section>
                
            </div>
        </div>
        
    </x-slot>
</x-layout>