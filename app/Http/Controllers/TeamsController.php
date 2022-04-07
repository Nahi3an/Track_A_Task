<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Team_Developer;
use App\Models\Team_Tester;
use Illuminate\Http\Request;

class TeamsController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Recieving the converted request object
        $project_info = $request->request->all();

        // Getting project id
        $project_id = $project_info[0]['id'];

        $team = Team::create([

            'name' => 'Project Team',
            'project_id' => $project_id
        ]);

        // Getting the team info of created project
        $created_team_info = Team::where('project_id', $project_id)->get()->toArray();

        $team_id = $created_team_info[0]['id'];

        // Getting the developers ids sent form Project Controller
        $developer_ids = $project_info[1];
        // Getting the tester ids sent form Project Controller
        $tester_ids = $project_info[2];


        foreach ($developer_ids as $id) {
            $team_developer = Team_Developer::create([
                'team_id' => $team_id,
                'developer_id' => $id
            ]);
        }
        foreach ($tester_ids as $id) {
            $team_tester = Team_Tester::create([
                'team_id' => $team_id,
                'tester_id' => $id
            ]);
        }
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
