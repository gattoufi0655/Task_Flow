<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedUser = $request->query('user_id');
        $users = User::orderBy('name')->get();

        $taches = Tache::with(['projet', 'user'])
            ->when($selectedUser, function ($query, $userId) {
                $query->where('user_id', $userId);
            })
            ->latest()
            ->get();

        if ($request->wantsJson()) {
            return response()->json($taches);
        }

        return view('taches.index', compact('taches', 'users', 'selectedUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projets = Projet::orderBy('nom')->get();
        $users = User::orderBy('name')->get();
        return view('taches.create', compact('projets', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|in:todo,in_progress,done',
            'priorite' => 'required|in:basse,moyenne,haute',
            'date_echeance' => 'nullable|date',
            'projet_id' => 'required|exists:projets,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $tache = Tache::create($data);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Tâche créée avec succès',
                'tache' => $tache,
            ], 201);
        }

        return redirect()->route('app.taches.index')
            ->with('success', 'Tâche créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $tache = Tache::with('projet')->findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json($tache);
        }

        return redirect()->route('app.taches.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // À implémenter si nécessaire
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // À implémenter si nécessaire
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // À implémenter si nécessaire
    }
}
