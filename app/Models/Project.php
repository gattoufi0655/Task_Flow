<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Task;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Category;

class Project extends Model
{
        /**
     * Propriétaire du projet
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Membres du projet
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'project_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * Tâches du projet
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'start_date',
        'due_date',
        'owner_id',
    ];

    protected $casts = [
        'start_date' => 'date',
        'due_date' => 'date',
        'priority' => 'integer',
    ];

    // Les relations seront ajoutées dans l'exercice 2
}
