<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redo_Task extends Model
{
    use HasFactory;



    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}