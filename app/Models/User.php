<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Category;


#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /**
     * Projets dont l'utilisateur est propriétaire
     */
    public function ownedProjects()
    {
        return $this->hasMany(Projet::class, 'user_id');
    }

    /**
     * Tâches assignées à l'utilisateur
     */
    public function assignedTasks()
    {
        return $this->hasMany(Tache::class, 'user_id');
    }

    /**
     * Commentaires de l'utilisateur
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
        /** @use HasFactory<UserFactory> */
        use HasFactory, Notifiable;

        /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
