<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public $countries, $companyInfo;
    public function index()
    {
        $this->countries = Country::all();
        return view('admin.company.add-company', ['countries' => $this->countries]);
    }

    public function addCompany(Request $request)
    {
        Company::create([
            'user_id' => $request->admin_id,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'email' => $request->email,
            'website_url' => $request->website_url,
            'country_id' => $request->country_id
        ]);

        return back()->with('message', 'Company Registration Success!');
    }
    public function manageCompany()
    {
        $this->companyInfo = Company::select('companies.*', 'countries.name', 'countries.code')
            ->join('countries', 'companies.country_id', '=', 'countries.id')
            ->get();

        return view('admin.company.manage-company', ['companies' => $this->companyInfo]);
    }

    public function editCompany($id)
    {

        $this->company = Company::findOrFail($id);

        return view('admin.company.edit-company', ['company' => $this->company, 'countries' => Country::all()]);
    }
}