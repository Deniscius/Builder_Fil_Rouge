<?php

// app/Http/Controllers/OperationController.php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Projet;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function index($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        $operations = Operation::where('projet_id', $projetId)->get();
        return view('operations.index', compact('operations', 'projet'));
    }

    public function create($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        return view('operations.create', compact('projet'));
    }

    public function store(Request $request, $projetId)
    {
        $request->validate([
            'montant' => 'required|numeric',
            'dateOperation' => 'required|date',
            'description' => 'required|string|max:255',
            'nomOperation' => 'required|string|max:255', // Ajoutez cette ligne si nécessaire
        ]);

        $operation = new Operation($request->all());
        $operation->projet_id = $projetId;
        $operation->save();

        return redirect()->route('operations.index', ['projetId' => $projetId])->with('success', 'Opération créée avec succès.');
    }

    public function edit($projetId, $id)
    {
        $projet = Projet::findOrFail($projetId);
        $operation = Operation::findOrFail($id);
        return view('operations.edit', compact('operation', 'projet'));
    }

    public function update(Request $request, $projetId, $id)
    {
        $request->validate([
            'montant' => 'required|numeric',
            'dateOperation' => 'required|date',
            'description' => 'required|string|max:255',
            'nomOperation' => 'required|string|max:255', // Ajoutez cette ligne si nécessaire
        ]);

        $operation = Operation::findOrFail($id);
        $operation->update($request->all());

        return redirect()->route('operations.index', ['projetId' => $projetId])->with('success', 'Opération mise à jour avec succès.');
    }

    public function destroy($projetId, $id)
    {
        $operation = Operation::findOrFail($id);
        $operation->delete();

        return redirect()->route('operations.index', ['projetId' => $projetId])->with('success', 'Opération supprimée avec succès.');
    }
}
