@extends('manager.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">

            <div class="row" id="task_form">
                {{--  --}}
                <div class=" col-md-7 small-box bg-light p-3 mx-3 mt-2">
                    <form method="POST" action="">
                        @csrf


                        <h5><b>Assign Task</b></h5>
                        <div class="row mb-2">
                            <div class="col">
                                {{-- <input type="text" name="company_id" value="{{ $manager->company_id }}" hidden>
                                <input type="text" name="manager_id" value="{{ $manager->id }}" hidden>
                                <input type="text" name="project_id" value="project#00{{ sizeof($projects) + 1 }} " hidden> --}}
                                <label for="project_id" class="text-md-end">{{ __('Project Id') }}</label>
                                <input type="text" name="project_id" class="form-control"
                                    value="{{ $projectInfo['id'] }}" disabled>
                            </div>
                            <div class="col">
                                <label for="project_id" class="text-md-end">{{ __('Project Title') }}</label>
                                <input type="text" name="project_title" class="form-control"
                                    value="{{ $projectInfo['title'] }}" disabled>
                            </div>

                        </div>



                        <div class="row mb-2">

                            <div class="col-md">
                                <div class="row">
                                    <div class="col">
                                        <label for="task_id" class="text-md-end">{{ __('Task Id') }}</label>
                                        <input id="task_id" type="text" class="form-control"
                                            value="task#00{{ $taskCount + 1 }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="task_title" class="text-md-end">{{ __('Task Title') }}</label>

                                        <input id="task_title" type="text"
                                            class="form-control @error('task_title') is-invalid @enderror" name="task_title"
                                            value="{{ old('task_title') }}" required autocomplete="task_title" autofocus>

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
                                <div class="col-md">
                                    <label for="task_description">{{ __('Task Description') }}</label>

                                    <textarea id="task_description" type="text" class="form-control @error('task_description') is-invalid @enderror"
                                        name="task_description" required autocomplete="task_description" autofocus>{{ old('task_description') }}</textarea>

                                    @error('task_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="task_type" class="col-form-label text-md-end">{{ __('Task Type ') }}</label>
                                <select id="task_type" type="text"
                                    class="form-control @error('task_type') is-invalid @enderror" name="task_type"
                                    value="{{ old('task_type') }}" required autocomplete="task_type" autofocus">
                                    <option value="not_selected">Not Selected</option>
                                    @foreach ($taskTypes as $type)
                                        @if (old('task_type') == $type['id'])
                                            <option value="{{ $type['id'] }}" selected>{{ $type['task_type'] }}
                                            </option>
                                        @else
                                            <option value="{{ $type['id'] }}" selected>{{ $type['task_type'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}

                            </div>

                            <div class="col-md-8">
                            </div>
                        </div>

                        <div class="row">
                            {{-- Devlopers --}}
                            <div class="col-md-6">

                                {{-- @foreach (range(0, 2) as $x)
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
                                @endforeach --}}

                            </div>
                            {{-- Testers --}}
                            <div class="col-md-6">
                                {{-- @foreach (range(0, 2) as $x)
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
                                @endforeach --}}

                            </div>

                        </div>
                        <div class="row mb-2">
                            <label for="deadline"
                                class="col-md-4 col-form-label text-md-end">{{ __('Task Deadline') }}</label>

                            <div class="col-md-6">
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
                                <div class="fw-bold">On Going Task</div>
                                <a href="#">See more </a>
                            </div>
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Completed Task</div>
                                <a href="#">See more </a>
                            </div>
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                    </ul>
                    <h5 class="mt-2"><b>Recently Created Project</b></h5>

                    {{-- <ul class="list-group ">
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
                            <a href="#">See All Tasks</a>
                        </li>

                    </ul> --}}

                </div>
            </div>


        </section>

    </div>
@endsection
