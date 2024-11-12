<?php
// app/Http/Controllers/ServiceController.php

// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Projet;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        $services = Service::where('projet_id', $projetId)->get();
        return view('services.index', compact('services', 'projet'));
    }

    public function create($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        return view('services.create', compact('projet'));
    }

    public function store(Request $request, $projetId)
    {
        $request->validate([
            'nomService' => 'required|string|max:255',
            'typeService' => 'required|string|max:255',
        ]);

        $service = new Service($request->all());
        $service->projet_id = $projetId;
        $service->save();

        return redirect()->route('services.index', ['projetId' => $projetId])->with('success', 'Service créé avec succès.');
    }

    public function edit($projetId, $id)
    {
        $projet = Projet::findOrFail($projetId);
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service', 'projet'));
    }

    public function update(Request $request, $projetId, $id)
    {
        $request->validate([
            'nomService' => 'required|string|max:255',
            'typeService' => 'required|string|max:255',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->all());

        return redirect()->route('services.index', ['projetId' => $projetId])->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy($projetId, $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index', ['projetId' => $projetId])->with('success', 'Service supprimé avec succès.');
    }
}
