<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $fillable = ['country_id', 'user_id', 'company_name', 'website_url', 'address', 'email'];

    public function companyAdmins()
    {
        return $this->hasMany(CompanyAdmin::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}