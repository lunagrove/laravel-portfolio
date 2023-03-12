<x-layout>
  <x-slot name="content">

    <div class="w-3/4 mx-auto top-8">
      
          @if ($project)
            <h1 class="text-center font-bold text-xl mt-6 mb-3 text-lime-200">Edit Project: {{ $project->title }}</h1>
            <form class="form-edit" method="POST" action="/admin/projects/{{ $project->slug }}/edit" enctype="multipart/form-data">
                @method('PATCH')
          @else
            <h1 class="text-center font-bold text-xl mt-6 mb-3 text-lime-200">Create Project</h1>
            <form class="form-edit" method="POST" action="/admin/projects/create" enctype="multipart/form-data">
          @endif

          @csrf
            <div class="mb-6">
              <label for="title" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Title</label>
              <input type="text" name="title" id="title" value="{{ old('title') ?? $project?->title }}" required
              class="border border-gray-400 p2 w-1/2">
              @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div class="flex justify-between gap-6">
              <div class="mb-6 w-1/2">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Excerpt</label>
                <textarea name="excerpt" id="excerpt" required
                class="border border-gray-400 p2 w-full h-32">{{ old('excerpt') ?? $project?->excerpt }}</textarea>
                @error('excerpt')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-6 w-1/2">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Body</label>
                <textarea name="body" id="body" required
                class="border border-gray-400 p2 w-full h-32">{{ old('body') ?? $project?->body }}</textarea>
                @error('body')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="mb-6">
              <label for="url" class="block mb-2 uppercase font-bold text-xs text-indigo-600">URL</label>
                <input type="text" name="url" id="url" value="{{ old('url') ?? $project?->url }}" 
                class="border border-gray-400 p2 w-1/2">
                @error('url')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6 w-2/5">
              <label for="published" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Published</label>
                <input type="date" name="published_date" id="published_date" value="{{ old('published_date') ?? $project?->published_date }}" 
                class="border border-gray-400 p2 w-1/2">
                @error('published_date')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-between gap-6">
              <div class="mb-6 w-1/2">
                <div class="flex flex-row gap-2 text-indigo-600 text-xs">
                  <label for="thumb" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Thumbnail</label>
                  <label for="deletethumb" class="pl-4">Remove?</label>
                  <input class="mb-2" type="checkbox" id="deletethumb" name="deletethumb">
                </div>
                <input type="file" name="thumb" id="thumb"
                  value="{{ old('thumb') ?? $project?->thumb }}"
                  class="border border-gray-400 p2 w-full">
                <p class="text-indigo-600">{{$project?->thumb}}</p>
                @error('thumb')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-6 w-1/2">
                <div class="flex flex-row gap-2 text-indigo-600 text-xs">
                  <label for="image" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Image</label>
                  <label for="deleteimage" class="pl-4">Remove?</label>
                  <input class="mb-2" type="checkbox" id="deleteimage" name="deleteimage">
                </div>
                <input type="file" name="image" id="image"
                  value="{{ old('image') ?? $project?->image }}"
                  class="border border-gray-400 p2 w-full">
                <p class="text-indigo-600">{{$project?->image}}</p>
                @error('image')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="flex justify-between gap-6">
              <div class="mb-6 w-1/2">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Category</label>
                <select class="h-8 border-solid border-2 border-gray-300" name="category_id" id="category_id">
                  <option value="" selected disabled>Select a Category</option>
                  <option value="">None</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if ($category->id == old('category_id'))
                          selected
                        @elseif ($category->id == $project?->category_id)
                          selected
                        @endif>
                        {{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="w-1/2">
                <label for="tags" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Tags</label>
                <select name="tags[]" id="tags" multiple="multiple" class="border-solid border-2 border-gray-300">
                  @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}"
                      @if (old('tags') && in_array($tag->id, old('tags')))
                              selected
                      @elseif ($project && $project->tags)
                          @foreach ($project->tags as $projectTag)
                              @if ($tag->id == $projectTag->id)
                                  selected
                              @endif
                          @endforeach
                      @endif
                      >
                      {{ $tag->name }}</option>
                  @endforeach
                </select>
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>
          
            <div class="mb-2">
              <button type="submit" class="form-button text-indigo-700 font-bold py-2 px-4 mt-2">Submit</button>
            </div>
          </form>
    </div>

        
  </x-slot>
</x-layout>