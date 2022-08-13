<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'deadline',
        'description',
        'manager_id',
        'team_id',
        'user_id',
        'company_id',
        'project_id',
        'status'
    ];

    public function company()
    {

        return $this->belongsTo(Company::class);
    }

    public function team()
    {
        return $this->hasOne(Team::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}