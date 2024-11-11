<?php

// app/Http/Controllers/OperationController.php

// app/Http/Controllers/OperationController.php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function index($projetId)
    {
        $operations = Operation::where('projet_id', $projetId)->get();
        return view('operations.index', compact('operations', 'projetId'));
    }

    public function create($projetId)
    {
        return view('operations.create', compact('projetId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'nomOperation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'dateOperation' => 'required|date',
        ]);

        Operation::create($request->all());

        return redirect()->route('operations.index', $request->projet_id)->with('success', 'Opération créée avec succès.');
    }

    public function edit($id)
    {
        $operation = Operation::findOrFail($id);
        return view('operations.edit', compact('operation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'nomOperation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'dateOperation' => 'required|date',
        ]);

        $operation = Operation::findOrFail($id);
        $operation->update($request->all());

        return redirect()->route('operations.index', $request->projet_id)->with('success', 'Opération mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $operation = Operation::findOrFail($id);
        $projetId = $operation->projet_id;
        $operation->delete();

        return redirect()->route('operations.index', $projetId)->with('success', 'Opération supprimée avec succès.');
    }
}
