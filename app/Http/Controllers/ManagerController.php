<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Developer;
use App\Models\Manager;
use App\Models\Projects;
use App\Models\Tester;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $manager = Manager::where('user_id', $user_id)->get()->first();
        $company_id = $manager->company_id;
        $developers = Developer::where('company_id', $company_id)->get();
        $testers = Tester::where('company_id', $company_id)->get();
        $projects = Projects::all();
        return view('manager.dashboard', compact(['developers', 'testers', 'manager', 'projects']));
    }
}