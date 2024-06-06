<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Models\Service;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.services.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(serviceStoreRequest  $request)
    {
        $image = $request->file('image')->store('public/services');

        $service = service::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $service->categories()->attach($request->categories);
        }

        return to_route('admin.services.index')->with('success', 'service created successfully.');
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
    public function edit(service $service)
    {
        $services = Service::all();
        return view('admin.services.edit', compact('service', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $image = $service->image;
        if ($request->hasFile('image')) {
            Storage::delete($service->image);
            $image = $request->file('image')->store('public/services');
        }

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $service->categories()->sync($request->categories);
        }
        return to_route('admin.services.index')->with('success', 'service updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        Storage::delete($service->image);
        $service->delete();
        return to_route('admin.services.index')->with('danger', 'Service deleted successfully.');

    }
}
