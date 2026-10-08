<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\Task;

class Comment extends Model
{
        /**
     * Auteur du commentaire
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Tâche liée
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    protected $fillable = [
        'content',
        'user_id',
        'task_id',
    ];
}
