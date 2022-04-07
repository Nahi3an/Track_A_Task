<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team_Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'developer_id'
    ];
}