<x-layout>
  <x-slot name="content">

    <div class="w-4/5 mx-auto top-8">
        
      <div class="flex flex-row flex-1 lg:gap-16 justify-center">

        <div class="items-left lg:w-1/3 md:w-1/2 pt-20">
          @if ($tag)
            <h1 class="text-center font-bold text-xl mt-6 mb-3 text-lime-200">Edit Tag: {{ $tag->name }}</h1>
            <form class="form-edit" method="POST" action="/admin/tags/{{ $tag->slug }}/edit" enctype="multipart/form-data">
              @method('PATCH')
          @else
            <h1 class="text-center font-bold text-xl mt-6 mb-3 text-lime-200">Create Tag</h1>
            <form class="form-edit" method="POST" action="/admin/tags/create" enctype="multipart/form-data">
          @endif

          @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') ?? $tag?->name }}" required
            class="border border-gray-400 p2 w-full">
            @error('name')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-2">
            <button type="submit" class="form-button text-indigo-700 font-bold py-2 px-4 mt-6">Submit</button>
          </div>
        </form>
      </div>

      <div class="top-1/2 transform translate-y-1/2">
        <div class="relative lg:block hidden">  
            <img class="relative" src="{{ asset('/images/software-development.jpg') }}" alt="Software development process">
        </div>
      </div>
    </div>

  </x-slot>
</x-layout>