<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use App\Models\Task;

class Tag extends Model
{
        /**
     * Tâches associées
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_tag');
    }
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
}
