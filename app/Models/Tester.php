<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tester extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'personal_email',
        'contact_number',
        'address',
        'user_id',
        'company_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function company()
    {

        return $this->belongsTo(Company::class);
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function redo_test()
    {
        return $this->hasMany(Redo_Test::class);
    }

    public function teams()
    {

        return $this->belongsToMany(Team::class, 'testers_teams');
    }
}