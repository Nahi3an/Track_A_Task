<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Developer;
use App\Models\Manager;
use App\Models\Projects;
use App\Models\Tester;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ManagerController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $manager = Manager::where('user_id', $user_id)->get()->first();
        $latestProjects = Projects::where('manager_id', $manager->id)->orderBy('id', 'DESC')->limit(3)->get();
        $company_id = $manager->company_id;
        $developers = Developer::where('company_id', $company_id)->get();
        $testers = Tester::where('company_id', $company_id)->get();
        $allProjectsCount = count(Projects::all());
        $projects = Projects::where('manager_id', $manager->id)->get();
        $totalProjectCount = count($projects);
        $ongoingProjects = Projects::where('manager_id', $manager->id)
            ->where('status', 0)->get();
        $ongoingProjectsCount = count($ongoingProjects);
        $completedProjects = Projects::where('manager_id', $manager->id)
            ->where('status', 1)->get();
        $completedProjectsCount = count($completedProjects);

        return view('manager.project.project_dashboard', compact(['developers', 'testers', 'manager', 'projects', 'allProjectsCount', 'latestProjects', 'totalProjectCount', 'ongoingProjectsCount', 'completedProjectsCount']));
    }
}