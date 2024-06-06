<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img class="object-cover w-full h-full"
                            src="{{ asset('images/lotion.jpg') }}" alt="Makeup image" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Choose Your Preferred Stylist/Massage Therapist!</h3>
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="w-full p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">Step 2</div>
                            </div>
                            <form method="POST" action="{{ route('appointments.store.step-two') }}">
                                @csrf
                                <div class="sm:col-span-6 pt-5">
                                    @if(is_null($selectedServiceId))
                                        <div class="mt-1">
                                            <select id="service_id" name="service_id" class="form-multiselect block w-full mt-1" onchange="filterStylists()">
                                                <option value="">Select a Service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" {{ $selectedServiceId == $service->id ? 'selected' : '' }}>
                                                        {{ $service->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <input type="hidden" name="service_id" value="{{ $selectedServiceId }}">
                                    @endif
                                    <div class="mt-1">
                                        <select id="stylist_id" name="stylist_id" class="form-multiselect block w-full mt-1">
                                            <option value="">Select a Stylist/Massage Therapist</option>
                                            @foreach ($stylists as $stylist)
                                                <option class="stylist-option" value="{{ $stylist->id }}" {{ $stylist->id == optional($appointment)->stylist_id ? 'selected' : '' }}>
                                                    {{ $stylist->first_name }} {{ $stylist->last_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('stylist_id')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-6 p-4 flex justify-between">
                                    <a href="{{ route('appointments.step-one') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Previous</a>
                                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Make Reservation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            filterStylists(); // Ensure stylists are filtered according to the pre-selected service if any
        });

        function filterStylists() {
            var serviceSelect = document.getElementById('service_id');
            var stylistSelect = document.getElementById('stylist_id');
            var selectedService = serviceSelect ? serviceSelect.options[serviceSelect.selectedIndex].text.toLowerCase() : '';
            var isMassage = selectedService.includes('massage') || selectedService.includes('treatment');
            
            var stylistOptions = stylistSelect.getElementsByClassName('stylist-option');
            for (var i = 0; i < stylistOptions.length; i++) {
                var optionText = stylistOptions[i].text.toLowerCase();
                stylistOptions[i].style.display = (isMassage && optionText.includes('therapist')) || (!isMassage && !optionText.includes('therapist')) ? '' : 'none';
            }
        }
    </script>
</x-guest-layout>
