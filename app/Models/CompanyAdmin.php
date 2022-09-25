<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyAdmin extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'first_name', 'last_name', 'email', 'password', 'address',  'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}