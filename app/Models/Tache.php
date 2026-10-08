<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\User;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'statut',
        'priorite',
        'date_echeance',
        'projet_id',
        'user_id',
    ];

    protected $casts = [
        'date_echeance' => 'date',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
