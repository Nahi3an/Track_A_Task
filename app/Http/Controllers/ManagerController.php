<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Developer;
use App\Models\Manager;
use App\Models\Projects;
use App\Models\Tester;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ManagerController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;

        $user = User::where('id', $user_id)->get()->first();

        $manager = $user->manager;
        $developers = $manager->company->developer;
        $testers = $manager->company->tester;

        $allProjectsCount = count(Projects::all());
        $latestProjects = Projects::where('manager_id', $manager->id)->orderBy('id', 'DESC')->limit(3)->get();

        $projects = $manager->projects;
        $totalProjectCount = count($manager->projects);
        $ongoingProjects = Projects::where('manager_id', $manager->id)
            ->where('status', 0)->get();
        $ongoingProjectsCount = count($ongoingProjects);
        $completedProjects = Projects::where('manager_id', $manager->id)
            ->where('status', 1)->get();
        $completedProjectsCount = count($completedProjects);


        return view('manager.project.project_dashboard', compact(['developers', 'testers', 'manager', 'projects', 'allProjectsCount', 'latestProjects', 'totalProjectCount', 'ongoingProjectsCount', 'completedProjectsCount']));
    }
}