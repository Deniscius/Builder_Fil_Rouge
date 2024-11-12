<?php

// app/Http/Controllers/RessourceController.php

// app/Http/Controllers/RessourceController.php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\Service;
use App\Models\Projet;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function index($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        $ressources = Ressource::where('projet_id', $projetId)->get();
        return view('ressources.index', compact('ressources', 'projet'));
    }

    public function create($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        $services = Service::where('projet_id', $projetId)->get();
        return view('ressources.create', compact('projet', 'services'));
    }

    public function store(Request $request, $projetId)
    {
        $request->validate([
            'nomRessource' => 'required|string|max:255',
            'typeRessource' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'service_id' => 'required|exists:services,id',
        ]);

        $ressource = new Ressource($request->all());
        $ressource->projet_id = $projetId;
        $ressource->save();

        return redirect()->route('ressources.index', ['projetId' => $projetId])->with('success', 'Ressource créée avec succès.');
    }

    public function edit($projetId, $id)
    {
        $projet = Projet::findOrFail($projetId);
        $ressource = Ressource::findOrFail($id);
        $services = Service::where('projet_id', $projetId)->get();
        return view('ressources.edit', compact('ressource', 'projet', 'services'));
    }

    public function update(Request $request, $projetId, $id)
    {
        $request->validate([
            'nomRessource' => 'required|string|max:255',
            'typeRessource' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'service_id' => 'required|exists:services,id',
        ]);

        $ressource = Ressource::findOrFail($id);
        $ressource->update($request->all());

        return redirect()->route('ressources.index', ['projetId' => $projetId])->with('success', 'Ressource mise à jour avec succès.');
    }

    public function destroy($projetId, $id)
    {
        $ressource = Ressource::findOrFail($id);
        $ressource->delete();

        return redirect()->route('ressources.index', ['projetId' => $projetId])->with('success', 'Ressource supprimée avec succès.');
    }
}
