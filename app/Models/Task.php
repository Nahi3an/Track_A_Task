<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}