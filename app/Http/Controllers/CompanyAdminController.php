<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyAdmin;
use App\Models\Company;

class CompanyAdminController extends Controller
{
    //
    public $image, $imageName, $imageDirectory, $companyAdminInfo, $existingImage;

    public function index()
    {
        $this->companyAdminInfo = CompanyAdmin::select('company_admins.*', 'companies.company_name')
            ->join('companies', 'company_admins.company_id', 'companies.id')
            ->get();


        return view('admin.company_admin.manage-admin', ['companyAdmins' => $this->companyAdminInfo]);
    }

    public function create()
    {

        return view('admin.company_admin.add-admin', ['companies' => Company::all()]);
    }

    public function store(Request $request)
    {

        CompanyAdmin::create([
            'user_id' => $request->admin_id,
            'company_id' => $request->company_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt('12345678'),
            'image' => $this->saveImage($request, null)
        ]);

        return back()->with('message', 'Company Admin Registration Success!');
    }

    private function saveImage(Request $request, $existingImage)
    {
        if ($request->file('image') &&  $existingImage) {

            unlink($existingImage);
        } else if (!$request->file('image')) {

            return $existingImage;
        }

        if ($request->file('image')) {

            $this->imageName = rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $this->imageDirectory = 'back_end_asset/admin_assets/company_admin_image/';
            $request->file('image')->move($this->imageDirectory, $this->imageName);
            return  $this->imageDirectory . $this->imageName;
        }
    }

    public function edit(CompanyAdmin $companyAdmin)
    {

        return view('admin.company_admin.edit-admin', ['companyAdmin' => $companyAdmin, 'companies' => Company::all()]);
    }

    public function update(CompanyAdmin $companyAdmin, Request $request)
    {
        $this->existingImage = $companyAdmin->image;

        $companyAdmin->update([
            'user_id' => $request->admin_id,
            'company_id' => $request->company_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt('12345678'),
            'image' => $this->saveImage($request,  $this->existingImage)
        ]);

        return redirect()->route('manage.company.admin')->with('message', 'Company Admin Info Update Success!');
    }

    public function destroy(CompanyAdmin $companyAdmin)
    {
        unlink($companyAdmin->image);
        $companyAdmin->delete();
        return redirect()->route('manage.company.admin')->with('message', 'Company Admin Info Delete Success!');
    }
}