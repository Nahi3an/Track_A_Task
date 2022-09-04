<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Team;
use App\Models\Tester;
use App\Models\User;
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


        $dev = Developer::find(13);

        /* $dev->teams()->attach(32);
        $dev->teams()->detach(32);
        $dev->teams()->sync(33); */

        // dd($dev->teams);

        $team = Team::find(32);
        dd($team->developers);
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



        $request = $request->request->all();
        $developerIds = $request['developer_id'];
        $testerIds = $request['tester_id'];
        $projectId = $request['project_id'];

        $team = Team::create([

            'name' => 'Team of Project: ' .  $projectId,
            'project_id' => $projectId
        ]);

        $team = Team::select('id')->where('project_id', $projectId)->first();


        foreach ($developerIds as $id) {

            $developer = Developer::find($id);
            $developer->teams()->attach($team->id);
        }

        foreach ($testerIds as $id) {

            $tester = Tester::find($id);
            $tester->teams()->attach($team->id);
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