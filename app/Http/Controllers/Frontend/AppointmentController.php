<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Stylists;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function stepOne(Request $request)
    {
        $appointment = $request->session()->get('appointment', new Appointment());
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('appointments.step-one', compact('appointment', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'tel_number' => 'required',
            'date' => 'required|date'
        ]);

        $appointment = $request->session()->get('appointment', new Appointment());
        $appointment->fill($validated);
        $request->session()->put('appointment', $appointment);

        return redirect()->route('appointments.step-two');
    }

public function stepThree(Request $request)
{
    // $services = Service::all();
    $services = Service::where('description', 'like', '%Product%')->get();
    $stylists = Stylists::all();

    $appointment = $request->session()->get('appointment', new Appointment());
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('appointments.step-three', compact('appointment', 'min_date', 'max_date', 'services', 'stylists'));

}


    public function storeStepThree(Request $request)
    {
        
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'tel_number' => 'required',
            'date' => 'required|date',
            // 'stylist_id' => 'required|exists:stylists,id',
            'service_id' => 'required|exists:services,id'
        ]);
        $appointment = $request->session()->get('appointment', new Appointment());

        

        // $appointment = $request->session()->get('appointment');
        if (!$appointment) {
            return redirect()->route('appointments.step-three')->with('error', 'Session expired. Please start again.');
        }
        // dd("hehe");
        $appointment->fill($validated);
        $request->session()->put('appointment', $appointment);
        $appointment->save();

        return redirect()->route('thankyou2');
    }

    public function stepTwo(Request $request)
    {
        $selectedServiceId = $request->query('service_id', null);
    
        $appointment = $request->session()->get('appointment');
        if (!$appointment) {
            return redirect()->route('appointments.step-one')->with('error', 'No appointment information found. Please start again.');
        }
    
        // Directly pass the selectedServiceId to the view
        // This assumes your view logic will handle the display based on this variable
        $services = Service::where('description', 'not like', '%Product%')->get();
        $stylists = Stylists::all();
    
        return view('appointments.step-two', compact('appointment', 'services', 'stylists', 'selectedServiceId'));
    }
    
    

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'stylist_id' => 'required|exists:stylists,id',
            'service_id' => 'required|exists:services,id'
        ]);

        $appointment = $request->session()->get('appointment');
        if (!$appointment) {
            return redirect()->route('appointments.step-one')->with('error', 'Session expired. Please start again.');
        }

        $appointment->fill($validated);
        $appointment->save();

        $request->session()->forget('appointment');

        return redirect()->route('thankyou');
    }
}
