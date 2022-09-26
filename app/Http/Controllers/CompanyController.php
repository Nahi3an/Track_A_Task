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
        $this->companyInfo = Company::select('companies.*', 'countries.name', 'countries.code')
            ->join('countries', 'companies.country_id', '=', 'countries.id')
            ->get();

        return view('admin.company.manage-company', ['companies' => $this->companyInfo]);
    }

    public function create()
    {
        $this->countries = Country::all();
        return view('admin.company.add-company', ['countries' => $this->countries]);
    }

    public function store(Request $request)
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

    public function edit(Company $company)
    {

        return view('admin.company.edit-company', ['company' => $company, 'countries' => Country::all()]);
    }

    public function update(Company $company, Request $request)
    {
        $company->update([
            'user_id' => $request->admin_id,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'email' => $request->email,
            'website_url' => $request->website_url,
            'country_id' => $request->country_id
        ]);

        return redirect()->route('manage.company')->with('message', 'Company Info Update Success!');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('manage.company')->with('message', 'Company Info Delete Success!');
    }
}