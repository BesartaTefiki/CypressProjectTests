<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StylistStoreRequest;
use App\Models\Stylists;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stylists = Stylists::all();
        return view('admin.stylists.index', compact('stylists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stylists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StylistStoreRequest $request)
    {
        $email = $request->email;
    
        // Check if the email already exists in the database
        $existingStylist = Stylists::where('email', $email)->first();
    
        if ($existingStylist) {
            return redirect()->route('admin.stylists.index')->with('error', 'Email address already exists.');
        }
    
        // Create a new stylist if the email doesn't exist
        Stylists::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $email,
            'phone_number' => $request->phone_number,
            'bio' => $request->bio,
        ]);
    
        return redirect()->route('admin.stylists.index')->with('success', 'Stylist created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stylists $stylist)
    {
        return view('admin.stylists.edit', compact('stylist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StylistStoreRequest $request, stylists $stylist)
    {
        $stylist->update($request->validated());

        return to_route('admin.stylists.index')->with('success', 'Stylist updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stylists $stylist)
    {
        $stylist->delete();
        
        return to_route('admin.stylists.index')->with('success', 'Stylist updated successfully.');

    }
}