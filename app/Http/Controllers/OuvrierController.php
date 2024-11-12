<?php

// app/Http/Controllers/OuvrierController.php

// app/Http/Controllers/OuvrierController.php

namespace App\Http\Controllers;

use App\Models\Ouvrier;
use App\Models\Service;
use App\Models\Projet;
use Illuminate\Http\Request;

class OuvrierController extends Controller
{
    public function index($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        $ouvriers = Ouvrier::where('projet_id', $projetId)->get();
        return view('ouvriers.index', compact('ouvriers', 'projet'));
    }

    public function create($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        $services = Service::where('projet_id', $projetId)->get();
        return view('ouvriers.create', compact('projet', 'services'));
    }

    public function store(Request $request, $projetId)
    {
        $request->validate([
            'nomOuvrier' => 'required|string|max:255',
            'specialisation' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
        ]);

        $ouvrier = new Ouvrier($request->all());
        $ouvrier->projet_id = $projetId;
        $ouvrier->save();

        return redirect()->route('ouvriers.index', ['projetId' => $projetId])->with('success', 'Ouvrier créé avec succès.');
    }

    public function edit($projetId, $id)
    {
        $projet = Projet::findOrFail($projetId);
        $ouvrier = Ouvrier::findOrFail($id);
        $services = Service::where('projet_id', $projetId)->get();
        return view('ouvriers.edit', compact('ouvrier', 'projet', 'services'));
    }

    public function update(Request $request, $projetId, $id)
    {
        $request->validate([
            'nomOuvrier' => 'required|string|max:255',
            'specialisation' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
        ]);

        $ouvrier = Ouvrier::findOrFail($id);
        $ouvrier->update($request->all());

        return redirect()->route('ouvriers.index', ['projetId' => $projetId])->with('success', 'Ouvrier mis à jour avec succès.');
    }

    public function destroy($projetId, $id)
    {
        $ouvrier = Ouvrier::findOrFail($id);
        $ouvrier->delete();

        return redirect()->route('ouvriers.index', ['projetId' => $projetId])->with('success', 'Ouvrier supprimé avec succès.');
    }
}
