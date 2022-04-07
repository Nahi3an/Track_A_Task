<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Team;
use App\Rules\DeveloperTesterUnique;
use App\Rules\ValidateSelectField;
use Illuminate\Http\Request;
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

        $request->validate([
            'project_title' => ['required', 'string', 'min:5', 'max:20'],
            'project_description' => ['required', 'string', 'min:15', 'max:255'],
            'developers.*' => ['required', new ValidateSelectField(), 'distinct'],
            'testers.*' => ['required', new ValidateSelectField(), 'distinct']

        ]);

        // Getting the project id generated on the UI
        $project_id = $request->input('project_id');

        $project = Projects::create([

            'title' => $request->input('project_title'),
            'deadline' => $request->input('deadline'),
            'company_id' => $request->input('company_id'),
            'description' => $request->input('project_description'),
            'manager_id' => $request->input('manager_id'),
            'project_id' => $request->input('project_id')
        ]);

        //with generated project id getting the information of project as array
        $created_project_info = Projects::where('project_id', $project_id)->get()->toArray();

        //Pussing the developers & tester ids into the arrray to pass it to the TeamsController
        array_push($created_project_info, $request->input('developers'), $request->input('testers'));

        // Creating a request object to pass all the project information to the store method of Teams controller
        $request = new Request();
        $request->request->add($created_project_info);

        // passing all project information as request object to TeamsController
        $team = new TeamsController();
        $team->store($request);

        return redirect()->route('manager_dashboard');
    }


    /**
     * Display the specified resource.
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