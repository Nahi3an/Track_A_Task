<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function  showCompanyAdminForm()
    {

        return view('admin.company_admin.add-admin');
    }

    public function addCompanyAdmin(Request $request)
    {

        // $admin = User::findOrFail($request->admin_id);
        // Company::create([
        //     'company_name' => $request->company_name,
        //     'address' => $request->company_address,
        //     'website_url' => $request->website_url
        // ]);


        // $admin->companyAdmins()->create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,

        // ]);
    }
    public function manageCompanyAdmin()
    {

        return view('admin.company_admin.manage-admin');
    }
}