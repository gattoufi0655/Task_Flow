<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tache;
use App\Models\User;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'statut',
        'date_debut',
        'date_fin',
        'user_id',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    // Un projet appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un projet a plusieurs tâches
    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}
