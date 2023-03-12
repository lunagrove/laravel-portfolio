<x-layout>
  <x-slot name="content">

    <div class="w-4/5 mx-auto top-8">
        
      <div class="flex flex-row flex-1 lg:gap-16 justify-center">

        <div class="items-left lg:w-1/3 md:w-1/2 pt-20">
          @if ($user)
            <h1 class="text-center font-bold text-xl mt-6 mb-3 text-lime-200">Edit User: {{ $user->name }}</h1>
            <form class="form-edit" method="POST" action="/register/{{ $user->id }}/edit" enctype="multipart/form-data">
                @method('PATCH')
          @else
            <h1 class="text-center font-bold text-xl mt-6 mb-3 text-lime-200">Create User</h1>
            <form class="form-edit" method="POST" action="/register" enctype="multipart/form-data">
          @endif

          @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Name</label>
            <input type="text" name="name" value="{{ old('name') ?? $user?->name }}" id="name" required class="h-7 pl-2 text-base border border-gray-400 p2 w-full">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Email</label>
            <input type="text" name="email" value="{{ old('email') ?? $user?->email }}" id="email" class="h-7 pl-2 text-base border border-gray-400 p2 w-full">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Password</label>
            <input type="password" name="password" id="password" 
              class="h-7 pl-2 text-base border border-gray-400 p2 w-full">
          </div>
          <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Confirm
              Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" 
              class="h-7 pl-2 text-base border border-gray-400 p2 w-full">
            @error('password')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-2">
            <button type="submit" class="form-button text-indigo-700 font-bold py-2 px-4 mt-6">Submit</button>
          </div>
        </form>
      </div>
      <div class="top-1/2 transform translate-y-1/3">
        <div class="relative lg:block hidden">  
            <img class="relative h-80 object-cover" src="{{ asset('/images/agile.jpg') }}" alt="Agile software development process">
        </div>
      </div>
    </div>
  </x-slot>
</x-layout>