<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.appointments.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back to Appointments</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.appointments.store') }}">
                        @csrf
                        <!-- First Name -->
                        <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <div class="mt-1">
                                <input type="text" id="first_name" name="first_name" class="block w-full mt-1" />
                            </div>
                        </div>
                        <!-- Last Name -->
                        <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <div class="mt-1">
                                <input type="text" id="last_name" name="last_name" class="block w-full mt-1" />
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email" class="block w-full mt-1" />
                            </div>
                        </div>
                        <!-- Phone Number -->
                        <div class="sm:col-span-6">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <div class="mt-1">
                                <input type="number" id="tel_number" name="tel_number" class="block w-full mt-1" />
                            </div>
                        </div>
                        <!-- Appointment Date -->
                        <div class="sm:col-span-6">
                            <label for="date" class="block text-sm font-medium text-gray-700">Appointment Date</label>
                            <div class="mt-1">
                                <input type="datetime-local" id="date" name="date" class="block w-full mt-1" />
                            </div>
                        </div>
                        <!-- Service Selection -->
                        <div class="sm:col-span-6 pt-5">
                            <label for="service_id" class="block text-sm font-medium text-gray-700">Service</label>
                            <div class="mt-1">
                                <select id="service_id" name="service_id" class="form-multiselect block w-full mt-1" onchange="filterStylists()">
                                    <option value="">Select a Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Stylist/Massage Therapist Selection -->
                        <div class="sm:col-span-6 pt-5">
                            <label for="stylist_id" class="block text-sm font-medium text-gray-700">Stylist/Massage Therapist</label>
                            <div class="mt-1">
                                <select id="stylist_id" name="stylist_id" class="form-multiselect block w-full mt-1">
                                    <option value="">Select a Stylist/Massage Therapist</option>
                                    @foreach ($stylists as $stylist)
                                        <option class="stylist-option" value="{{ $stylist->id }}">{{ $stylist->first_name }} {{ $stylist->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="mt-6 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterStylists() {
            var serviceSelect = document.getElementById('service_id');
            var stylistSelect = document.getElementById('stylist_id');
            var selectedService = serviceSelect.options[serviceSelect.selectedIndex].text.toLowerCase();
            var isMassage = selectedService.includes('massage') || selectedService.includes('treatment') ;
            var isStylist = selectedService.includes('stylist');

            var stylistOptions = stylistSelect.getElementsByClassName('stylist-option');
            for (var i = 0; i < stylistOptions.length; i++) {
                var optionText = stylistOptions[i].text.toLowerCase();
                if (isMassage) {
                    stylistOptions[i].style.display = optionText.includes('therapist') ? '' : 'none';
                } else {
                    stylistOptions[i].style.display = optionText.includes('therapist') ? 'none' : '';
                }
            }
        }
    </script>
</x-admin-layout>
