<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Task;
use App\Models\Team;
use App\Models\Team_Developer;
use App\Models\Projects;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DeveloperController extends Controller
{
    public function index()
    {

        $userId = auth()->user()->id;
        $developer = Developer::where('user_id', $userId)->get()->first();


        $devTestTasks = Task::where('task_type', 1)
            ->where('developer_id', $developer->id)
            ->get()->toArray();
        $devTasks = Task::where('task_type', 2)
            ->where('developer_id', $developer->id)
            ->get()->toArray();

        $teamInfo = Team_Developer::where('developer_id', $developer->id)
            ->get()->toArray();

        $teamIds = [];

        foreach ($teamInfo as $team) {

            array_push($teamIds, $team['team_id']);
        }

        // dd($teamIds);
        $projects = Team::select("project_id")
            ->whereIn('id', $teamIds)
            ->get()->toArray();
        $projectIds = [];
        foreach ($projects as $keys => $project) {

            array_push($projectIds, $project['project_id']);
        }


        $projectInfo = Projects::select("*")
            ->whereIn('id', $projectIds)
            ->get()->toArray();

        // dd($projectInfo);
        return view('developer.developer_dashboard', compact(['devTestTasks', 'devTasks', 'projectInfo']));
    }
}