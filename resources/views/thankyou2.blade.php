<x-guest-layout>
  <div class="container w-full px-5 py-6 mx-auto text-center">
      <p class="mb-4">Your Order is all set and scheduled!</p>
      
      <a href="{{ route('appointments.step-three') }}"
          class="px-4 py-2 bg-violet-500 hover:bg-violet-700 rounded-lg text-white mr-2">Make Another Order</a>

      <a href="{{ url('/') }}"
          class="px-4 py-2 bg-violet-500 hover:bg-violet-700 rounded-lg text-white">Go to Homepage</a>
  </div>
</x-guest-layout>
