@extends('manager.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">

            <div class="row container-fluid" id="project_form">
                {{--  --}}
                <div class=" col-md-7 small-box bg-light p-3 mx-3 mt-2">
                    <form method="POST" action="{{ route('project.store') }}">
                        @csrf
                        <h5><b>Create a New Project</b></h5>
                        <input type="text" name="company_id" value="{{ $manager->company_id }}" hidden>
                        <input type="text" name="manager_id" value="{{ $manager->id }}" hidden>
                        <input type="text" name="project_id" value="project#00{{ $allProjectsCount + 1 }} " hidden>


                        <div class="row mb-3">

                            <div class="col-md">

                                <label for="project_id" class="text-md-end">Global Project Id</label>
                                <input id="project_id" type="text" class="form-control"
                                    value="project#00{{ $allProjectsCount + 1 }}" disabled>

                                <label for="project_title" class="text-md-end">Project Title</label>

                                <input id="project_title" type="text"
                                    class="form-control @error('project_title') is-invalid @enderror" name="project_title"
                                    value="{{ old('project_title') }}" required autocomplete="project_title" autofocus>

                                @error('project_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md">
                                <label for="project_description">Project Description</label>

                                <textarea id="project_description" type="text"
                                    class="form-control @error('project_description') is-invalid @enderror" name="project_description" required
                                    autocomplete="project_description" autofocus>{{ old('project_description') }}</textarea>

                                @error('project_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Devlopers --}}
                            <div class="col-md-6">

                                @foreach (range(0, 2) as $x)
                                    <div class="row mb-2">

                                        <div class="col-md  {{ $errors->has('developers.' . $x) }}">
                                            <label for="develope_{{ $x }}" class="form-label">Developer
                                                {{ $x + 1 }}</label><br>

                                            <select id="develope_{{ $x }}" type="text" class="form-control"
                                                style="color: black" name="developers[]">

                                                <option value="not_selected">Not Selected

                                                </option>


                                                @foreach ($developers as $developer)
                                                    {{ $name = $developer->first_name . ' ' . $developer->last_name . ' (id: ' . $developer->id . ')' }}
                                                    @if (old('developers.' . $x) == $developer->id)
                                                        <option value="{{ $developer->id }}" selected>
                                                            {{ $name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $developer->id }}">
                                                            {{ $name }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            @if ($errors->has('developers.' . $x))
                                                <span class="help-block text-danger">
                                                    <strong> {{ $errors->first('developers.' . $x) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            {{-- Testers --}}
                            <div class="col-md-6">

                                @foreach (range(0, 2) as $x)
                                    <div class="row mb-2">

                                        <div class="col-md  {{ $errors->has('testers.' . $x) }}">
                                            <label for="tester_{{ $x }}" class="form-label">Tester
                                                {{ $x + 1 }}</label><br>

                                            <select id="tester_{{ $x }}" type="text" class="form-control"
                                                style="color: black" name="testers[]">

                                                <option value="not_selected">Not Selected

                                                </option>

                                                @foreach ($testers as $tester)
                                                    {{ $name = $tester->first_name . ' ' . $tester->last_name . ' (id: ' . $tester->id . ')' }}
                                                    @if (old('testers.' . $x) == $tester->id)
                                                        <option value="{{ $tester->id }}" selected> {{ $name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $tester->id }}">
                                                            {{ $name }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            @if ($errors->has('testers.' . $x))
                                                <span class="help-block text-danger">
                                                    <strong> {{ $errors->first('testers.' . $x) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="deadline" class="col-md-4 col-form-label text-md-end">Project Deadline</label>

                            <div class="col-md-6">
                                <small>**Minimum deadline 7 Days</small>
                                <input id="deadline" type="date"
                                    class="form-control @error('deadline') is-invalid @enderror" name="deadline"
                                    value="{{ old('deadline') }}" required autocomplete="deadline" autofocus>


                                @error('deadline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            {{-- <button type="button" class="btn btn-danger me-md-2" data-dismiss="modal">Cancel</button> --}}
                            <button class="btn btn-success" type="submit">Create</button>
                        </div>


                    </form>
                </div>
                <div class="col-md-4 mt-2">

                    <ul class="list-group ">
                        <h5><b>Your Projects</b></h5>
                        <li class="list-group-item d-flex justify-content-between align-items-start ">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    Created Projects
                                </div>
                                <a href="#">See more </a>
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $totalProjectCount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">On Going Projects</div>
                                <a href="#">See more </a>
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $ongoingProjectsCount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Completed Projects</div>
                                <a href="#">See more </a>
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $completedProjectsCount }}</span>
                        </li>
                    </ul>
                    <h5 class="mt-2"><b>Recently Created Project</b></h5>

                    <ul class="list-group ">
                        @if (count($latestProjects) > 0)
                            @foreach ($latestProjects as $latestProject)
                                <li class="list-group-item d-flex justify-content-between align-items-start ">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">
                                            {{ $latestProject->title }}
                                        </div>
                                        <a href="#">See more </a>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between align-items-start ">
                                <a href="#">See All Projects</a>
                            </li>
                        @else
                            <li class="list-group-item d-flex justify-content-between align-items-start ">
                                No Projects Found
                            </li>
                        @endif

                    </ul>

                </div>
            </div>

            <!-- Task Create -->
            <div class="row container-fluid">
                <div class="col-md-7">
                    <form method="POST" action={{ route('project.addTaskToProject') }}>
                        @csrf
                        <h5><b>Add Task To Project</b></h5>
                        <input type="text" name="manager_id" value="{{ $manager->id }}" hidden>
                        <label for="project" class="form-label">Select Project ID
                        </label><br>

                        <select id="selected_project" type="text" class="form-control" name="selected_project">
                            <option value="not_selected">Not Selected</option>


                            </option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->project_id }}
                                </option>
                            @endforeach

                        </select>
                        <button class="btn btn-success mt-2" type="submit">Add Task</button>
                    </form>


                </div>
            </div>


        </section>
    </div><!-- /.container-fluid -->

    <!-- /.content -->
    </div>

    <script></script>
@endsection
