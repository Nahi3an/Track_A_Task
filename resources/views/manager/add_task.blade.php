@extends('manager.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">

            <!-- Select Project ID -->
            <div class="row container-fluid">
                <div class="col-md-8 p-3 mx-1 mt-3 small-box bg-light" style="width: 65%;">
                    <form method="POST" action="{{ route('project.addTaskToProject') }}">
                        @csrf
                        <h5><b>Add Task To Project</b></h5>
                        <input type="text" name="manager_id" value="{{ $managerId }}" hidden>
                        <label for="project" class="form-label">Select Project ID
                        </label><br>

                        <select id="selected_project" type="text" class="form-control" name="selected_project">
                            <option value="not_selected">Not Selected</option>


                            </option>
                            @foreach ($projectInfo as $project)
                                <option value="{{ $project['id'] }}">{{ $project['project_id'] }}
                                </option>
                                {{-- <p></p> --}}
                            @endforeach

                        </select>
                        <button class="btn btn-success mt-2" type="submit">Add Task</button>
                    </form>


                </div>
                <div class="col-md-4 mt-2">
                    <h5 class="mt-2"><b>Manager Tasks Overview</b></h5>
                    <ul class="list-group ">
                        <li class="list-group-item d-flex justify-content-between align-items-start ">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    Total Task Assigned
                                </div>
                                <a href="#">See more </a>
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $taskCount }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Development & Testing Related Task</div>
                                <a href="#">See more </a>


                            </div>
                            <span class="badge bg-primary rounded-pill"
                                style="margin-left: 1px;">{{ $devTestTaskCount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Only Development Reated Task</div>
                                <a href="#">See more </a>
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $devTaskCount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Only Testing Reated Task</div>
                                <a href="#">See more </a>
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $testTaskCount }}</span>
                        </li>
                    </ul>
                    <h5 class="mt-2"><b>Recently Assigned Task</b></h5>

                    <ul class="list-group ">
                        @foreach ($latestTasks as $latestTask)
                            <li class="list-group-item  justify-content-between align-items-start ">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">
                                        {{ $latestTask['title'] }}
                                    </div>
                                    <a href="#">See more </a>
                                </div>

                                @if ($latestTask['task_type'] == 1)
                                    <span class="badge bg-primary rounded-pill">Dev & Test</span>
                                @elseif ($latestTask['task_type'] == 2)
                                    <span class="badge bg-primary rounded-pill">Dev</span>
                                @else
                                    <span class="badge bg-primary rounded-pill">Test</span>
                                @endif

                                <span class="badge bg-primary rounded-pill">{{ $latestTask['tags'] }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-start ">
                            <a href="#">See All Tasks</a>
                        </li>

                    </ul>

                </div>
            </div>

        </section>
    </div><!-- /.container-fluid -->

    <!-- /.content -->
    </div>

    <script></script>
@endsection
