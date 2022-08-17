@extends('manager.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">

            <div class="row container-fluid" id="project_form">
                {{--  --}}

            </div>

            <!-- Task Create -->
            <div class="row container-fluid">
                <div class="col-md-7 p-3 mx-3 mt-2 small-box bg-light">
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

            {{-- <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-circle-plus"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div> --}}
            <!-- /.row -->
        </section>
    </div><!-- /.container-fluid -->

    <!-- /.content -->
    </div>

    <script></script>
@endsection
