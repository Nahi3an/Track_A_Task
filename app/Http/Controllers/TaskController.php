<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Task;
use App\Models\Task_Type;
use App\Models\Tester;
use App\Rules\DevTesterValidationBasedOnTaskType;
use App\Rules\ValidateSelectField;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function getRequestInfo(Request $request)
    // {

    //     return $request->manager_id;
    // }
    public function index(Request $request)
    {


        $managerId = $request->manager_id;
        $projectInfo = $request->project_info;
        $taskInfo = Task::where('project_id', $projectInfo['id'])->get();
        $taskCount = count($taskInfo);
        $developers = Developer::where('company_id', $projectInfo['company_id'])->get();
        $testers = Tester::where('company_id', $projectInfo['company_id'])->get();
        $taskTypes = Task_Type::where('task_type', '!=', 'personal')->get()->toArray();



        return view('manager.task_dashboard', compact(['managerId', 'projectInfo', 'taskInfo', 'taskCount', 'testers', 'developers', 'taskTypes']));
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
            'developer' => $conditionDev,
            'tester' => $conditionTester


        ]);

        $data = $request->all();


        if ($data['task_type'] == '2') {

            $data['tester'] = 'not_assigned';
        } else if ($data['task_type'] == '3') {
            $data['developer'] = 'not_assigned';
        }

        // dd($data);
        // User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'role' => ''
        // ]);
        Task::create();
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