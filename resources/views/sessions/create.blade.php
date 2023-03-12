<x-layout>
  <x-slot name="content">

    <div class="w-4/5 mx-auto top-8">
      
      <div class="flex flex-row flex-1 lg:gap-16 justify-center">

        <div class="items-left lg:w-1/3 md:w-1/2 pt-20">
          <h1 class="text-center font-bold text-xl mb-3 mt-6 text-lime-200">Login</h1>
          <form class="form-edit" method="POST" action="/login">
            @csrf
            <div class="mb-6">
              <label for="email" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Email</label>
              <input type="text" name="email" value="{{ old('email') }}" id="email" required class="h-7 pl-2 text-base border border-gray-400 p2 w-full">
              @error('email')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-6">
              <label for="password" class="block mb-2 uppercase font-bold text-xs text-indigo-600">Password</label>
              <input type="password" name="password" id="password" required
                class="h-7 pl-2 text-base border border-gray-400 p2 w-full">
            </div>
            <div class="mb-2">
              <button type="submit" class="form-button text-indigo-700 font-bold py-2 px-4 mt-6">Submit</button>
            </div>
          </form>
        </div>
      
        <div class="top-1/2 transform translate-y-1/2">
          <div class="relative lg:block hidden">  
              <img class="relative h-80" src="{{ asset('/images/project-image1.jpg') }}" alt="Project Design">
          </div>
        </div>
      </div>
    </div>

  </x-slot>
</x-layout>