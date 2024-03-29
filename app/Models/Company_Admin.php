<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Admin extends Model
{
    use HasFactory;

    function company()
    {
        return $this->belongsTo(Company::class);
    }
}