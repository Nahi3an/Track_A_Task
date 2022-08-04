<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Task;
use App\Models\Task_Type;
use App\Models\Tester;
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


        $manager_id = $request->manager_id;
        $projectInfo = $request->project_info;

        $taskInfo = Task::where('project_id', $projectInfo['id'])->get();
        $taskCount = count($taskInfo);
        $developers = Developer::where('company_id', $projectInfo['company_id'])->get()->toArray();
        $testers = Tester::where('company_id', $projectInfo['company_id'])->get()->toArray();
        //  dd($testers);
        $taskTypes = Task_Type::get()->toArray();
        //  dd($taskTypes[0]['id']);


        return view('manager.task_dashboard', compact(['manager_id', 'projectInfo', 'taskInfo', 'taskCount', 'testers', 'developers', 'taskTypes']));
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