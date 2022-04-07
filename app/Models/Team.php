<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'project_id'
    ];


    public function projects()
    {

        return $this->belongsTo(Projects::class);
    }
}