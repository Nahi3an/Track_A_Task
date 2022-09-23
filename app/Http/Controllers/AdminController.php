<?php

namespace App\Http\Controllers;

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

        return $request;
    }
    public function manageCompanyAdmin()
    {

        return view('admin.company_admin.manage-admin');
    }
}