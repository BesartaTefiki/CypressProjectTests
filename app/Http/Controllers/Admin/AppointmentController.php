<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentStoreRequest;
use App\Models\Appointment;
use App\Models\Stylists;
use App\Models\Service;

use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('description', 'not like', '%Product%')->get();
        $stylists = Stylists::all();
        return view('admin.appointments.create', compact('stylists', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentStoreRequest $request)
    {
        $validated = $request->validated();

        $appointment = new Appointment();
        $appointment->first_name = $validated['first_name'];
        $appointment->last_name = $validated['last_name'];
        $appointment->email = $validated['email'];
        $appointment->tel_number = $validated['tel_number'];
        $appointment->date = Carbon::parse($validated['date']);
        $appointment->service_id = $validated['service_id'];
        $appointment->stylist_id = $validated['stylist_id'];

        $appointment->save();

        return to_route('admin.appointments.index')->with('success', 'Appointment created successfully.');
    }



    // public function store(AppointmentStoreRequest $request)
    // {

        
    //     dd("test");
    //     $service = Service::findOrFail($request->service_id);
    //     $stylist = Stylists::findOrFail($request->stylist_id);

       
    //     $request_date = Carbon::parse($request->date);
    //     foreach ($stylist->appointments as $appointment) {
            
    //     }
    //     Appointment::create($request->validated());

    //     return redirect()->route('admin.appointments.index')->with('success', 'Reservation created successfully.');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {

        $services = Service::where('description', 'not like', '%Product%')->get();
        $stylists = Stylists::all();
        return view('admin.appointments.edit', compact('appointment', 'stylists', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentStoreRequest $request, Appointment $appointment)
    {
        $stylist = Stylists::findOrFail($request->stylist_id);
    
        $request_date = Carbon::parse($request->date);
        $otherAppointments = $stylist->appointments()->where('id', '!=', $appointment->id)->get();
        foreach ($otherAppointments as $otherAppointment) {
            if ($otherAppointment->date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This stylist is reserved for this date.');
            }
        }
    
        $appointment->update($request->validated());
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('admin.appointments.index')->with('warning', 'Appointment deleted successfully.');
    }
}
