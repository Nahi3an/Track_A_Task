@extends('manager.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">

            <div class="row" id="task_form">
                {{--  --}}
                <div class=" col-md-7 small-box bg-light p-3 mx-3 mt-2" style="width: 63%;">
                    <form method="POST" action="{{ route('task.create') }}">
                        @csrf

                        <h5><b>Assign Task</b></h5>
                        <div class="row mb-2">
                            <div class="col">

                                <input type="text" name="manager_id" value="{{ $managerId }}" hidden>
                                <input type="text" name="company_id" value="{{ $projectInfo[0]['company_id'] }}" hidden>
                                <input type="text" name="project_id" value="{{ $projectInfo[0]['id'] }}" hidden>
                                <input type="text" class="form-control" name="task_id"
                                    value="task#00{{ $allTaskCount + 1 }}" hidden>


                                <label class="text-md-end">Project Id</label>
                                <input type="text" class="form-control" value="{{ $projectInfo[0]['project_id'] }}"
                                    disabled>
                            </div>
                            <div class="col">
                                <label for="project_title" class="text-md-end">Project Title</label>
                                <input type="text" name="project_title" class="form-control"
                                    value="{{ $projectInfo[0]['title'] }}" disabled>
                            </div>

                        </div>
                        <div class="row mb-2">

                            <div class="col-md">
                                <div class="row">
                                    <div class="col">
                                        <label for="taskId" class="text-md-end">Task Id</label>
                                        <input id="taskId" type="text" class="form-control"
                                            value="task#00{{ $allTaskCount + 1 }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="task_title" class="text-md-end">Task Title</label>

                                        <input id="task_title" type="text"
                                            class="form-control @error('task_title') is-invalid @enderror" name="task_title"
                                            value="{{ old('task_title') }}" autocomplete="task_title" autofocus>

                                        @error('task_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-8">

                                <label for="task_description">Task Description</label>

                                <textarea id="task_description" type="text" class="form-control @error('task_description') is-invalid @enderror"
                                    name="task_description" autocomplete="task_description" autofocus>{{ old('task_description') }}</textarea>

                                @error('task_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                            <div class="col-md-4">
                                <label for="task_tag" class="form-label">Task Tag </label>
                                <input id="taskTag" type="text" name="task_tag"
                                    class="form-control @error('task_tag') is-invalid @enderror"
                                    value="{{ old('task_tag') }}" autofocus>

                                @error('task_tag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="task_type" class="form-label">Task Type </label>
                                <select id="taskType" type="text"
                                    class="form-control  @error('task_type') is-invalid @enderror" name="task_type"
                                    value="{{ old('task_type') }}">
                                    <option value="not_selected">Not Selected</option>

                                    @foreach ($taskTypes as $type)
                                        @if (old('task_type') == $type['id'])
                                            <option value="{{ $type['id'] }}" selected>{{ $type['task_type'] }}
                                            </option>
                                        @else
                                            <option value="{{ $type['id'] }}">{{ $type['task_type'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>


                                @error('task_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>

                            <div class="col-md-6">

                                <label for="deadline" class="form-label">Task Deadline</label>
                                <input id="deadline" type="datetime-local"
                                    class="form-control @error('dead_line') is-invalid @enderror" name="dead_line"
                                    value="{{ old('dead_line') }}" autofocus>

                                @error('dead_line')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>


                        </div>
                        <div class="row mb-2" id="developersTestersList">
                            {{-- Devlopers --}}
                            <div class="col-md-6 mt-2">
                                <div id="developersList">
                                    <label for="developer" style="margin-bottom: 0px;">Assign Developers</label> <br>
                                    {{-- <small><b>(**Mark Not Selected for Task Type: Testing)</b></small> --}}
                                    <select id="developer" type="text" value="{{ old('developer_id') }}"
                                        class="form-control @error('developer_id') is-invalid @enderror"
                                        name="developer_id">
                                        <option value="not_selected">Not Selected

                                        </option>
                                        @foreach ($developers as $developer)
                                            {{ $name = $developer->first_name . ' ' . $developer->last_name . ' (id: ' . $developer->id . ')' }}

                                            @if (old('developer_id') == $developer->id)
                                                <option value="{{ $developer->id }}" selected>{{ $name }}
                                                </option>
                                            @else
                                                <option value="{{ $developer->id }}">{{ $name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('developer_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>
                            {{-- Testers --}}
                            <div class="col-md-6 mt-2">
                                <div id="testersList">
                                    <label for="Tester" style="margin-bottom: 0px;">Assign Testers</label> <br>
                                    {{-- <small><b>(**Mark Not Selected for Task Type: Development)</b></small> --}}
                                    <select id="tester" type="text"
                                        class="form-control @error('tester_id') is-invalid @enderror" name="tester_id"
                                        value={{ old('tester_id') }}>
                                        <option value="not_selected">Not Selected

                                        </option>
                                        @foreach ($testers as $tester)
                                            {{ $name = $tester->first_name . ' ' . $tester->last_name . ' (id: ' . $tester->id . ')' }}
                                            @if (old('tester_id') == $tester->id)
                                                <option value="{{ $tester->id }}" selected>{{ $name }}</option>
                                            @else
                                                <option value="{{ $tester->id }}">{{ $name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('tester_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            {{-- <button type="button" class="btn btn-danger me-md-2" data-dismiss="modal">Cancel</button> --}}
                            <button class="btn btn-success" type="submit">Create</button>
                        </div>
                    </form>

                </div>
                <div class="col-md-4 mt-2">
                    <h5 class=""><b>Project Overview
                        </b></h5>
                    <ul class="list-group ">
                        <li class="list-group-item d-flex justify-content-between align-items-start ">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    Total Project Task
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
                    <h5 class="mt-2"><b>Recent Project Tasks</b></h5>

                    <ul class="list-group ">
                        @if (sizeof($latestTasks) == 0)
                            <li class="list-group-item d-flex justify-content-between align-items-start ">
                                <div class="fw-bold">No Task Added</div>
                            </li>
                        @else
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
                                <li class="list-group-item d-flex justify-content-between align-items-start ">
                                    <a href="#">See All Tasks</a>
                                </li>
                            @endforeach
                        @endif



                    </ul>

                </div>
            </div>
        </section>
    </div>


@endsection
