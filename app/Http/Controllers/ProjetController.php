<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projets = Projet::withCount('taches')->latest()->get();

        if ($request->wantsJson()) {
            return response()->json($projets);
        }

        return view('projets.index', compact('projets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $projet = Projet::with('taches')->findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json($projet);
        }

        return view('projets.show', compact('projet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('projets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|in:en_attente,en_cours,termine',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        $data['user_id'] = Auth::id() ?? 1;
        $projet = Projet::create($data);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Projet créé avec succès',
                'projet' => $projet,
            ], 201);
        }

        return redirect()->route('app.projets.index')
            ->with('success', 'Projet créé avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.edit', compact('projet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projet = Projet::findOrFail($id);

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|in:en_attente,en_cours,termine',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        $projet->update($data);

        return redirect()->route('app.projets.index')
            ->with('success', 'Projet mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();

        return redirect()->route('app.projets.index')
            ->with('success', 'Projet supprimé avec succès.');
    }
}
