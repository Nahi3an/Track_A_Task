<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Developer;
use App\Models\Projects;
use App\Models\Task;
use App\Models\Task_Type;
use App\Models\Tester;
use App\Rules\DevTesterValidationBasedOnTaskType;
use App\Rules\validateDateTime;
use App\Rules\ValidateSelectField;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getReturnInfoToTaskDashboard($managerId, $projectInfo)
    {


        // dd($projectInfo[0]['company_id']);
        $taskInfo = Task::where('project_id', $projectInfo[0]['id'])->get();
        $allTaskInfo = Task::all();
        $allTaskCount = count($allTaskInfo);
        // dd($allTaskCount);

        $taskCount = count($taskInfo);
        $developers = Developer::where('company_id', $projectInfo[0]['company_id'])->get();
        $testers = Tester::where('company_id', $projectInfo[0]['company_id'])->get();
        $taskTypes = Task_Type::where('id', '!=', '4')->get()->toArray();
        $devTestTask =  Task::where('task_type', 1)
            ->where('project_id', $projectInfo[0]['id'])
            ->get()->toArray();
        $devTask = Task::where('task_type', 2)
            ->where('project_id', $projectInfo[0]['id'])
            ->get()->toArray();
        $testTask = Task::where('task_type', 3)
            ->where('project_id', $projectInfo[0]['id'])
            ->get()->toArray();
        $latestTasks = Task::where('manager_id', $managerId)
            ->where('project_id', $projectInfo[0]['id'])
            ->orderBy('id', 'DESC')->limit(5)->get()->toArray();

        $devTestTaskCount = count($devTestTask);
        $devTaskCount = count($devTask);
        $testTaskCount = count($testTask);




        $result = compact(['managerId', 'projectInfo', 'taskInfo', 'allTaskCount', 'taskCount', 'testers', 'developers', 'taskTypes', 'devTestTaskCount', 'devTaskCount', 'testTaskCount', 'latestTasks']);

        return $result;
    }

    public function index(Request $request)
    {


        $managerId = $request->manager_id;
        $projectInfo = $request->project_info;
        $projectInfo = [$projectInfo];


        $result = $this->getReturnInfoToTaskDashboard($managerId, $projectInfo);
        return view('manager.task.task_dashboard', $result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {

        $data = $request->all();

        //For getting all project info
        $projectInfo = Projects::where('id', $data['project_id'])->get()->toArray();

        //Project deadline & Project Assgined Date
        $projectCreated = explode("T",  $projectInfo[0]['created_at']);
        $projectDeadline =  explode(" ",  $projectInfo[0]['deadline']);


        // Developer & Tester Custom Validation
        $conditionDev =  ['required', new ValidateSelectField()];
        $conditionTester =  ['required', new ValidateSelectField()];
        if ($request->task_type == '2') {
            $conditionTester =  [new DevTesterValidationBasedOnTaskType()];
        } elseif ($request->task_type == '3') {

            $conditionDev = [new DevTesterValidationBasedOnTaskType()];
        }



        $request->validate([
            'task_title' => ['required', 'string', 'min:5', 'max:20'],
            'task_description' => ['required', 'string', 'min:15', 'max:255'],
            'task_type' => ['required', new ValidateSelectField()],
            'dead_line' => ['required'],
            'task_tag' => ['required', 'starts_with:#'],
            'developer_id' => $conditionDev,
            'tester_id' => $conditionTester,
            'dead_line' => ['required', 'after_or_equal:' .  $projectCreated[0], 'before_or_equal:' . $projectDeadline[0]]

        ]);



        $status = 1;
        if ($data['task_type'] == '2') {

            $data['tester_id'] = null;
            $status = 11;
        } else if ($data['task_type'] == '3') {
            $data['developer_id'] = null;
            $status = 21;
        }


        Task::create(
            [
                'title' => $data['task_title'],
                'description' =>  $data['task_description'],
                'tags' => $data['task_tag'],
                'status' => $status,
                'manager_id' => $data['manager_id'],
                'developer_id' => $data['developer_id'],
                'tester_id' => $data['tester_id'],
                'project_id' => $data['project_id'],
                'deadline' => $data['dead_line'],
                'task_type' => $data['task_type'],
                'task_id' => $data['task_id'],

            ]

        );


        $managerId = $data['manager_id'];
        // $projectInfo = Projects::where('id', $data['project_id'])->get()->toArray();
        $result = $this->getReturnInfoToTaskDashboard($managerId, $projectInfo);

        return view('manager.task.task_dashboard', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}