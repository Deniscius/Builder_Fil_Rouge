<?php

// app/Http/Controllers/ProjetController.php

// app/Http/Controllers/ProjetController.php

// app/Http/Controllers/ProjetController.php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Site;
use App\Models\Service;
use App\Models\Ouvrier;
use App\Models\Ressource;
use App\Models\Operation;
use Illuminate\Http\Request;

class ProjetController extends Controller

{
    public function index()
    {
        $projets = Projet::all();
        return view('projets.index', compact('projets'));
    }

    public function selectProject($id)
    {
        $projet = Projet::findOrFail($id);
        session(['projetId' => $projet->id]);
        return redirect()->route('home');
    }

    public function gerer($id)
    {
        $projet = Projet::findOrFail($id);
        $sites = $projet->sites;
        $services = $projet->services;
        $ressources = $projet->ressources;
        $operations = $projet->operations;
        return view('projets.gerer', compact('projet', 'sites', 'services', 'ressources', 'operations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomProjet' => 'required|string|max:255',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
        ]);

        Projet::create($request->all());

        return redirect()->route('projets.index')->with('success', 'Projet créé avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomProjet' => 'required|string|max:255',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
        ]);

        $projet = Projet::findOrFail($id);
        $projet->update($request->all());

        return redirect()->route('projets.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();

        return redirect()->route('projets.index')->with('success', 'Projet supprimé avec succès.');
    }

    public function sites($projetId)
    {
        $sites = Site::where('projet_id', $projetId)->get();
        return view('sites.index', compact('sites', 'projetId'));
    }
}
