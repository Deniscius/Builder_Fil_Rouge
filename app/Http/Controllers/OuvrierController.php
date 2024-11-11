<?php

// app/Http/Controllers/OuvrierController.php

// app/Http/Controllers/OuvrierController.php

namespace App\Http\Controllers;

use App\Models\Ouvrier;
use Illuminate\Http\Request;

class OuvrierController extends Controller
{
    public function index($serviceId)
    {
        $ouvriers = Ouvrier::where('service_id', $serviceId)->get();
        return view('ouvriers.index', compact('ouvriers', 'serviceId'));
    }

    public function create($serviceId)
    {
        return view('ouvriers.create', compact('serviceId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'nomOuvrier' => 'required|string|max:255',
        ]);

        Ouvrier::create($request->all());

        return redirect()->route('ouvriers.index', $request->service_id)->with('success', 'Ouvrier créé avec succès.');
    }

    public function edit($id)
    {
        $ouvrier = Ouvrier::findOrFail($id);
        return view('ouvriers.edit', compact('ouvrier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'nomOuvrier' => 'required|string|max:255',
        ]);

        $ouvrier = Ouvrier::findOrFail($id);
        $ouvrier->update($request->all());

        return redirect()->route('ouvriers.index', $request->service_id)->with('success', 'Ouvrier mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $ouvrier = Ouvrier::findOrFail($id);
        $serviceId = $ouvrier->service_id;
        $ouvrier->delete();

        return redirect()->route('ouvriers.index', $serviceId)->with('success', 'Ouvrier supprimé avec succès.');
    }
}
