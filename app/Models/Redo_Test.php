<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redo_Test extends Model
{
    use HasFactory;


    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function tester()
    {
        return $this->belongsTo(Tester::class);
    }

    public function manager()
    {

        return $this->belongsTo(Manager::class);
    }
}