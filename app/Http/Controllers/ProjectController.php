<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Manager;
use App\Models\Projects;
use App\Models\Task;
use App\Models\Team;
use App\Rules\DeveloperTesterUnique;
use App\Rules\ValidateSelectField;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Getting date greater than equal to 7 days
        $current = Carbon::today();
        $deadlineRange = explode(" ", $current->addDays(7));
        $deadlineRange = $deadlineRange[0];

        $request->validate([

            'project_title' => ['required', 'string', 'min:5', 'max:20'],
            'project_description' => ['required', 'string', 'min:15', 'max:255'],
            'developers.*' => ['required', new ValidateSelectField(), 'distinct'],
            'testers.*' => ['required', new ValidateSelectField(), 'distinct'],
            'deadline' => ['required', 'after_or_equal:' . $deadlineRange]

        ]);



        // Getting the project id generated on the UI
        $project_id = $request->input('project_id');
        $manager_id = $request->input('manager_id');

        $project = Projects::create([

            'title' => $request->input('project_title'),
            'deadline' => $request->input('deadline'),
            'company_id' => $request->input('company_id'),
            'description' => $request->input('project_description'),
            'manager_id' => $request->input('manager_id'),
            'project_id' => $request->input('project_id'),
            'status' => 0
        ]);

        //with generated project id getting the information of project as array
        $created_project_info = Projects::where('project_id', $project_id)->get()->toArray();

        //All Project info to send In task UI
        $project_info = $created_project_info[0];

        //Passing the developers & tester ids into the arrray to pass it to the TeamsController
        array_push($created_project_info, $request->input('developers'), $request->input('testers'));

        // Creating a request object to pass all the project information to the store method of Teams controller
        $request = new Request();
        $request->request->add($created_project_info);

        // passing all project information as request object to TeamsController
        $team = new TeamsController();
        $team->store($request);

        return redirect()->route('task_dashboard', compact(['manager_id', 'project_info']));
    }

    public function addTaskToProject(Request $request)
    {
        // dd($request);
        $manager_id = $request->manager_id;
        $selected_project_info = Projects::where('id', $request->selected_project)->get()->toArray();
        // dd($selected_project_info);
        $project_info = $selected_project_info[0];
        return redirect()->route('task_dashboard', compact(['manager_id', 'project_info']));
    }

    public function getProjectAndTaskInfo()
    {

        $user_id = auth()->user()->id;
        $manager = Manager::where('user_id', $user_id)->get()->first();

        $managerId = $manager->id;
        $projectInfo = Projects::all()->toArray();
        $taskInfo = Task::where('manager_id', $managerId)->get();
        $taskCount = count($taskInfo);
        $devTestTask =  Task::where('task_type', 1)
            ->where('manager_id', $managerId)
            ->get()->toArray();
        $devTask = Task::where('task_type', 2)
            ->where('manager_id', $managerId)
            ->get()->toArray();
        $testTask = Task::where('task_type', 3)
            ->where('manager_id', $managerId)
            ->get()->toArray();
        $latestTasks = Task::where('manager_id', $managerId)->orderBy('id', 'DESC')->limit(5)->get()->toArray();

        $devTestTaskCount = count($devTestTask);
        $devTaskCount = count($devTask);
        $testTaskCount = count($testTask);

        return view('manager.add_task', compact(['managerId', 'projectInfo', 'devTestTaskCount', 'taskCount', 'devTaskCount', 'testTaskCount', 'latestTasks']));
    }
    /**
     * Display the specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}