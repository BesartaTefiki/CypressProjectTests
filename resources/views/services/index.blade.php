<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($services as $service)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full" src="{{ asset('images/' . $service->image) }}" alt="service Image">
                    <div class="px-6 py-4">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                            {{ $service->name }}
                        </h4>
                        <p class="leading-normal text-gray-700">{{ $service->description }}.</p>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <span class="text-xl text-green-600">${{ $service->price }}</span>
                        @if (strpos($service->description, 'product') !== false)
                            <a href="{{ route('appointments.step-three') }}"
                               class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Order Product</a>
                        @else
                            <!-- Modify the link to include the service ID for pre-selection -->
                            <a href="{{ route('appointments.step-two', ['service_id' => $service->id]) }}"
                               class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Book Appointment</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
