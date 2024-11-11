<?php


// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($projetId)
    {
        $services = Service::where('projet_id', $projetId)->get();
        return view('services.index', compact('services', 'projetId'));
    }

    public function create($projetId)
    {
        return view('services.create', compact('projetId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'nomService' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index', $request->projet_id)->with('success', 'Service créé avec succès.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'nomService' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->all());

        return redirect()->route('services.index', $request->projet_id)->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $projetId = $service->projet_id;
        $service->delete();

        return redirect()->route('services.index', $projetId)->with('success', 'Service supprimé avec succès.');
    }
}
