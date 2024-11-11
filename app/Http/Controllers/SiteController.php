<?php

// app/Http/Controllers/ProjetController.php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Models\Site;

class ProjetController extends Controller
{
    public function index($projetId)
    {
        $sites = Site::where('projet_id', $projetId)->get();
        return view('sites.index', compact('sites', 'projetId'));


        $projets = Projet::all();
        return view('projets.index', compact('projets'));
    }

    public function gerer($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.gerer', compact('projet'));
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
}
