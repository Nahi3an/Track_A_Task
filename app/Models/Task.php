<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'tags',
        'status',
        'developer_id',
        'manager_id',
        'project_id',
        'tester_id',
        'deadline',
        'task_type',
        'task_id'
    ];

    public function project()
    {

        return $this->belongsTo(Projects::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function task_type()
    {
        return $this->hasOne(task_type::class);
    }

    public function redo_task()
    {
        return $this->hasMany(Redo_Task::class);
    }

    public function redo_test()
    {
        return $this->hasMany(Redo_Test::class);
    }
}