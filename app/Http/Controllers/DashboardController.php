<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjets = Projet::count();
        $totalTaches = Tache::count();
        $openTaches = Tache::whereIn('statut', ['todo', 'in_progress'])->count();
        $completedTaches = Tache::where('statut', 'done')->count();
        $recentProjets = Projet::latest()->take(5)->get();
        $recentTaches = Tache::with(['projet', 'user'])->latest()->take(5)->get();
        $topUsers = User::withCount('assignedTasks')
            ->orderByDesc('assigned_tasks_count')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalProjets',
            'totalTaches',
            'openTaches',
            'completedTaches',
            'recentProjets',
            'recentTaches',
            'topUsers'
        ));
    }
}
