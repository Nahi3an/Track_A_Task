<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Carbon\Carbon;
use App\Models\Manager;
use App\Models\Projects;
use App\Models\Task;
use App\Models\Team;
use App\Models\Team_Developer;
use App\Models\Team_Tester;
use App\Models\Tester;
use App\Rules\DeveloperTesterUnique;
use App\Rules\ValidateSelectField;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $key = $request->key;
        $userId = auth()->user()->id;
        $manager = Manager::where('user_id', $userId)->get()->first();



        if ($key == "oldtonew") {
            $allProjects = Projects::orderBy('created_at', 'asc')->get();
        } else if ($key == "newtoold") {
            $allProjects = Projects::orderBy('created_at', 'desc')->get();
        } else if ($key == "nearestbydeadline") {
            $allProjects = Projects::orderBy('deadline', 'asc')->get();
        } else if ($key == "farthestbydeadline") {
            $allProjects = Projects::orderBy('deadline', 'desc')->get();
        } else if ($key == "completed") {
            $allProjects = Projects::where('status', 1)->get();
        } else if ($key == "notcompleted") {
            $allProjects = Projects::where('status', 0)->get();
        } else {
            $allProjects = Projects::where('manager_id', $manager->id)->get();
        }

        // dd(count($allProjects));

        return view('manager.project.all_project', compact(['allProjects', 'key']));
    }

    // <option value="nearestbydeadline">Nearest Deadline</option>
    // <option value="farthestbydeadline">Farthest Deadline</option>

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


        //Getting date greater than equal to 7 days

        $current = Carbon::today();
        $deadlineRange = explode(" ", $current->addDays(7));
        $deadlineRange = $deadlineRange[0];

        // dd($request);
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

        return view('manager.task.add_task', compact(['managerId', 'projectInfo', 'devTestTaskCount', 'taskCount', 'devTaskCount', 'testTaskCount', 'latestTasks']));
    }
    /**
     * Display the specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $singleProjectInfo = Projects::where('id', $request->id)->first();
        $projectTeam = Team::where('project_id', $request->id)->first();


        $projectDevs = Team_Developer::where('team_id', $projectTeam->id)->get()->toArray();

        $developers = array();
        foreach ($projectDevs as $dev) {

            $developer = Developer::where('id', $dev['developer_id'])->first();
            $developer = array('id' => $developer->id, 'first_name' => $developer->first_name, 'last_name' => $developer->last_name);

            array_push($developers,  $developer);
        }



        $projectTesters = Team_Tester::where('team_id', $projectTeam->id)->get()->toArray();

        $testers = array();
        foreach ($projectTesters as $test) {

            $tester = Tester::where('id', $test['tester_id'])->first();
            $tester = array('id' => $tester->id, 'first_name' => $tester->first_name, 'last_name' => $tester->last_name);

            array_push($testers,  $tester);
        }


        //dd($testers);

        return view('manager.project.single_project', compact(['singleProjectInfo', 'developers', 'testers']));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $singleProjectInfo = Projects::select('id', 'title', 'description', 'deadline')
            ->where('id', $id)->first();


        return view('manager.project.project_edit', compact(['singleProjectInfo']));
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
        if ($request->new_deadline == null) {
            $deadline = $request->old_deadline;
        } else {
            $deadline = $request->new_deadline;
        }

        // dd($deadline);

        Projects::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $deadline,
        ]);

        $singleProjectInfo = Projects::select('id', 'title', 'description', 'deadline')
            ->where('id', $id)->first();



        return view('manager.project.project_edit', compact(['singleProjectInfo']));
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