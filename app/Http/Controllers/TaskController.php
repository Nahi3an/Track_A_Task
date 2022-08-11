<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Projects;
use App\Models\Task;
use App\Models\Task_Type;
use App\Models\Tester;
use App\Rules\DevTesterValidationBasedOnTaskType;
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
    /* public function redirectToAddTaskView($managerId, $projectInfo)
    {
        // dd($projectInfo);
        $taskInfo = Task::where('project_id', $projectInfo['id'])->get();
        $taskCount = count($taskInfo);
        $developers = Developer::where('company_id', $projectInfo['company_id'])->get();
        $testers = Tester::where('company_id', $projectInfo['company_id'])->get();
        $taskTypes = Task_Type::where('id', '!=', '4')->get()->toArray();

        return view('manager.task_dashboard', compact(['managerId', 'projectInfo', 'taskInfo', 'taskCount', 'testers', 'developers', 'taskTypes']));
    }
    */
    public function getReturnInfoToTaskDashboard($managerId, $projectInfo)
    {
        $taskInfo = Task::where('project_id', $projectInfo['id'])->get();
        $taskCount = count($taskInfo);
        $developers = Developer::where('company_id', $projectInfo['company_id'])->get();
        $testers = Tester::where('company_id', $projectInfo['company_id'])->get();
        $taskTypes = Task_Type::where('id', '!=', '4')->get()->toArray();
        $result = compact(['managerId', 'projectInfo', 'taskInfo', 'taskCount', 'testers', 'developers', 'taskTypes']);

        return $result;
    }

    public function index(Request $request)
    {


        $managerId = $request->manager_id;
        $projectInfo = $request->project_info;
        // $this->redirectToAddTaskView($managerId, $projectInfo);
        $result = $this->getReturnInfoToTaskDashboard($managerId, $projectInfo);
        return view('manager.task_dashboard', $result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {

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
            'tester_id' => $conditionTester

        ]);

        $data = $request->all();


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
        $projectInfo = Projects::where('id', $data['project_id'])->get()->toArray();
        $projectInfo = $projectInfo[0];
        $result = $this->getReturnInfoToTaskDashboard($managerId, $projectInfo);

        return view('manager.task_dashboard', $result);
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