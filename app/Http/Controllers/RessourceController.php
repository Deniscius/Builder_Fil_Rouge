<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\RessourceQuantite;
use App\Models\Service;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function index($projetId)
    {
        $ressources = Ressource::where('projet_id', $projetId)->get();
        return view('ressources.index', compact('ressources', 'projetId'));
    }

    public function create($projetId)
    {
        $services = Service::where('projet_id', $projetId)->get();
        return view('ressources.create', compact('projetId', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'nomRessource' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantite_initiale' => 'required|integer',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        $ressource = Ressource::create($request->all());
        $ressource->services()->attach($request->services);

        // Ajouter la quantité initiale
        RessourceQuantite::create([
            'ressource_id' => $ressource->id,
            'date' => now()->toDateString(),
            'quantite' => $request->quantite_initiale,
        ]);

        return redirect()->route('ressources.index', $request->projet_id)->with('success', 'Ressource créée avec succès.');
    }

    public function edit($id)
    {
        $ressource = Ressource::findOrFail($id);
        $services = Service::where('projet_id', $ressource->projet_id)->get();
        return view('ressources.edit', compact('ressource', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'nomRessource' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantite_initiale' => 'required|integer',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        $ressource = Ressource::findOrFail($id);
        $ressource->update($request->all());
        $ressource->services()->sync($request->services);

        // Mettre à jour la quantité initiale
        $ressource->quantites()->updateOrCreate(
            ['date' => now()->toDateString()],
            ['quantite' => $request->quantite_initiale]
        );

        return redirect()->route('ressources.index', $request->projet_id)->with('success', 'Ressource mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $ressource = Ressource::findOrFail($id);
        $projetId = $ressource->projet_id;
        $ressource->delete();

        return redirect()->route('ressources.index', $projetId)->with('success', 'Ressource supprimée avec succès.');
    }
}
