<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Company extends Model
{
    use HasFactory;


    public function manager()
    {
        return $this->hasMany(Manager::class);
    }

    public function developer()
    {
        return $this->hasMany(Developer::class);
    }

    public function tester()
    {
        return $this->hasMany(Tester::class);
    }

    public function company_admin()
    {

        return $this->hasOne(Company_Admin::class);
    }

    public function projects()
    {

        return $this->hasMany(Projects::class);
    }

    public function country()
    {

        return $this->belongsTo(Country::class);
    }
}