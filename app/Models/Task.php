<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Project;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;

class Task extends Model
{
        /**
     * Projet parent
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Utilisateur assigné
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Catégorie
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Commentaires
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'task_tag');
    }


    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'due_date',
        'estimated_hours',
        'project_id',
        'assigned_to',
        'category_id',
    ];

    protected $casts = [
        'due_date' => 'date',
        'priority' => 'integer',
        'estimated_hours' => 'decimal:2',
    ];
}
