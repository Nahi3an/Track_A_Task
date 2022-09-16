<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    //protected $fillable = [];
    protected $fillable = [
        'name'
    ];

    public function country()
    {

        return $this->hasMany(Company::class);
    }
}