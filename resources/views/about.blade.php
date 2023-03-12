<x-layout>
    <x-slot name="content">
        
        <div class="lg:w-4/5 md:w-4/5 w-2/3 lg:mx-auto md:mx-auto ml-10 top-8">
            
                <div class="lg:flex md:flex sm:block xs:block flex-row flex-1 gap-10 lg:justify-between md:justify-between lg:pt-20 md:pt-20 mt-8">
                    
                    <div class="lg:w-2/5 md:w-1/2 w-2/3 mb-6">
                        <h2 class="text-5xl uppercase mb-8 text-lime-200">About me...</h2>
                        <p class="text-lime-200 mb-2">Originally from Auckland,New Zealand, now studying and living in British Columbia, Canada.</p>
                        <p class="text-lime-200 mb-2">From August 2022 to May 2023 I studied at BCIT, attending the Software Systems Developer course, during which time I gained industry-standard skills in full stack web programming, covering a wide variety of platforms and technologies.</p>
                        <p class="text-lime-200 mb-2">I love small dogs, in particular chihuahuas, which I bred and showed over a period of 10 years. In my spare time I love to sew and read. I enjoy gaming
                        and of course...coding!!
                        </p>
                    </div>

                    <div class="lg:w-3/5 w-2/3 mt-8 mb-12 ml-6">
                        {{-- <div class="w-full h-auto">   --}}
                            <img class="object-cover ml-auto" width="600" src="{{ asset('/images/auckland.jpg') }}" alt="Auckland city and harbour">
                        {{-- </div> --}}
                    </div>    
                    
                </div>   

        </div>

    </x-slot>
</x-layout>