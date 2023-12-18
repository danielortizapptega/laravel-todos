<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['description', 'task_id'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
