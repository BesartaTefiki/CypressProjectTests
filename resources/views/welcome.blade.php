<x-guest-layout>
    
    <div class="container mx-auto py-40 px-6 bg-cover bg-center" style="background-image: url('images/lotion.jpg');">
        <div class="text-center bg-opacity-50 bg-black p-6 rounded-lg">
            <h1 class="text-6xl font-extrabold text-white sm:leading-tight">
                <span class="block">Beauty & SPA Center</span>
            </h1>
       
            <div class="mt-10">
                <a href="{{ route('appointments.step-one') }}" class="px-8 py-3 text-lg font-semibold 
                text-white bg-violet-600 rounded-full hover:bg-violet-700 focus:outline-none">
                    Book Your Appointment
                </a>
            </div>
        </div>
    </div>
    

    <section class="py-20 bg-gradient-to-r from-purple-500 to-pink-500">
        <div class="container mx-auto max-w-7xl px-10 text-white">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
                <div>
                    <img src="{{ asset('images/salon3.png') }}" class="w-full h-auto rounded-xl shadow-2xl" alt="Nails Image" />
                </div>
                <div class="space-y-4">
                    <h2 class="text-5xl font-extrabold">Step into a world of elegance and luxury.</h2>
                    <p class="text-lg">
                        Established in 2024, Erbora's Beauty  is a sanctuary of beauty and relaxation, dedicated to enhancing your personal charm and confidence...
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-900">
        <div class="container mx-auto max-w-5xl px-6 text-gray-300">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-4xl font-extrabold mb-4">Let us make it shine at Erbora's Beauty</h2>
                    <p class="text-lg mb-4 leading-loose">At Erbora's Beauty, we believe in the transformative power of beauty. Established in 2024, our salon is a testament to our dedication...</p>
                    <div class="mb-4">
                        <a href="{{ route('services.index') }}" class="px-8 py-3 text-lg font-semibold 
                        text-white bg-violet-600 rounded-full hover:bg-violet-700 focus:outline-nonet">
                            Discover our Services & Products
                        </a>
                    </div>
                </div>
                <div>
                    <img class="mx-auto w-full h-auto rounded-xl shadow-2xl" src="{{ asset('images/makeup.jpg')}}" alt="Hair Image">
                </div>
            </div>
        </div>
    </section>
    

    
</x-guest-layout>
