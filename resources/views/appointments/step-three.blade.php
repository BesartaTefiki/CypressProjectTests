<x-guest-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="min-h-screen flex justify-center items-center bg-gradient-to-br from-violet-500 to-purple-700">
            <div class="max-w-lg w-full bg-white rounded-xl shadow-lg overflow-hidden p-6">
                <img class="w-full h-40 object-cover" src="{{ asset('images/hair2.png') }}" alt="Salon Image" />

                <div class="mt-4">
                    <h3 class="text-2xl font-semibold text-violet-800 text-center">Order Now</h3>
                    <div class="mt-2 bg-violet-200 p-2 rounded-full">
                        <div class="bg-violet-600 text-white text-sm font-semibold text-center rounded-full w-3/3"></div>
                    </div>

                    <form method="POST" action="{{ route('appointments.store.step-three') }}" class="mt-4">
                        @csrf
                        <!-- Form Fields -->
                        <div class="space-y-3">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" value="{{ $appointment->first_name ?? '' }}" class="w-full p-3 rounded-lg border border-gray-300 focus:border-violet-500 focus:ring-violet-500" />
                            @error('first_name')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" value="{{ $appointment->last_name ?? '' }}" class="w-full p-3 rounded-lg border border-gray-300 focus:border-violet-500 focus:ring-violet-500" />
                            @error('last_name')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="email" id="email" name="email" placeholder="Email" value="{{ $appointment->email ?? '' }}" class="w-full p-3 rounded-lg border border-gray-300 focus:border-violet-500 focus:ring-violet-500" />
                            @error('email')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="text" id="tel_number" name="tel_number" placeholder="Phone Number" value="{{ $appointment->tel_number ?? '' }}" class="w-full p-3 rounded-lg border border-gray-300 focus:border-violet-500 focus:ring-violet-500" />
                            @error('tel_number')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="datetime-local" id="date" name="date" min="{{ $min_date->format('Y-m-d\TH:i:s') }}" max="{{ $max_date->format('Y-m-d\TH:i:s') }}" value="{{ $appointment && $appointment->date ? $appointment->date->format('Y-m-d\TH:i:s') : '' }}" class="w-full p-3 rounded-lg border border-gray-300 focus:border-violet-500 focus:ring-violet-500" />
                            <p class="text-xs text-gray-600">Choose time between :10:00-20:00</p>
                            @error('date')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror

                            <div class="mt-1">
                                <select id="service_id" name="service_id" class="form-multiselect block w-full mt-1">
                                    <option value="">Select a product</option>
                                    @if(isset($services) && count($services) > 0)
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}" {{ $service->id == optional($appointment)->service_id ? 'selected' : '' }}>
                                                {{ $service->name }} 
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>No services available</option>
                                    @endif
                                </select>
                            </div>

                            
                        <!-- Submit Button -->
                        <div class="mt-6 text-right">
                            <button type="submit" class="px-6 py-2 bg-violet-600 hover:bg-violet-700 text-white rounded-lg font-medium">Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
