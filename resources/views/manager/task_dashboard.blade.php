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
                                <input type="text" name="project_id" value="{{ $projectInfo['id'] }}" hidden>

                                <label class="text-md-end">{{ __('Project Id') }}</label>
                                <input type="text" class="form-control" value="{{ $projectInfo['project_id'] }}"
                                    disabled>
                            </div>
                            <div class="col">
                                <label for="project_title" class="text-md-end">{{ __('Project Title') }}</label>
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

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="col-md">
                                    <label for="task_description">{{ __('Task Description') }}</label>

                                    <textarea id="task_description" type="text" class="form-control @error('task_description') is-invalid @enderror"
                                        name="task_description" autocomplete="task_description" autofocus>{{ old('task_description') }}</textarea>

                                    @error('task_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5">
                                    <label for="task_type" class="form-label">{{ __('Task Type ') }}</label>
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

                                <div class="col-md-4">

                                    <label for="deadline" class="form-label">{{ __('Task Deadline') }}</label>


                                    <input id="deadline" type="date"
                                        class="form-control @error('dead_line') is-invalid @enderror" name="dead_line"
                                        value="{{ old('dead_line') }}" autofocus>

                                    @error('dead_line')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                                <div class="col-md-3">
                                    <label for="task_tag" class="form-label">{{ __('Task Tag ') }}</label>
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


                        </div>
                        <div class="row mb-2" id="developersTestersList">
                            {{-- Devlopers --}}
                            <div class="col-md-6 mt-2">
                                <div id="developersList">
                                    <label for="developer" style="margin-bottom: 0px;">Assign Developers</label> <br>
                                    <small><b>(**Mark Not Selected for Task Type: Testing)</b></small>
                                    <select id="developer" type="text" value="{{ old('developer') }}"
                                        class="form-control @error('developer') is-invalid @enderror" name="developer">
                                        <option value="not_selected">Not Selected

                                        </option>
                                        @foreach ($developers as $developer)
                                            {{ $name = $developer->first_name . ' ' . $developer->last_name . ' (id: ' . $developer->id . ')' }}

                                            @if (old('developer') == $developer->id)
                                                <option value="{{ $developer->id }}" selected>{{ $name }}
                                                </option>
                                            @else
                                                <option value="{{ $developer->id }}">{{ $name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('developer')
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
                                    <small><b>(**Mark Not Selected for Task Type: Development)</b></small>
                                    <select id="tester" type="text"
                                        class="form-control @error('tester') is-invalid @enderror" name="tester"
                                        value={{ old('tester') }}>
                                        <option value="not_selected">Not Selected

                                        </option>
                                        @foreach ($testers as $tester)
                                            {{ $name = $tester->first_name . ' ' . $tester->last_name . ' (id: ' . $tester->id . ')' }}
                                            @if (old('tester') == $tester->id)
                                                <option value="{{ $tester->id }}" selected>{{ $name }}</option>
                                            @else
                                                <option value="{{ $tester->id }}">{{ $name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('tester')
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
                    <h5 class="mt-2"><b>Recently Assigned Task</b></h5>

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
    <script>
        // const el = document.getElementById('taskType');

        // const developersList = document.getElementById('developersList');
        // const testersList = document.getElementById('testersList');

        // //developersTestersList
        // developersList.addEventListener('load'function onLoad() {

        //     console.log(developersList.value);
        // })

        // el.addEventListener('change', function handleChange(event) {
        //     if (event.target.value === 'not_selected' || event.target.value === '1') {
        //         developersList.style.display = 'block';
        //         testersList.style.display = 'block';



        //     } else if (event.target.value === '2') {
        //         developersList.style.display = 'block';
        //         testersList.style.display = 'none';
        //         // //developersList.value = 0;
        //         // console.log(developersList.value)


        //     } else if (event.target.value === '3') {
        //         developersList.style.display = 'none';
        //         testersList.style.display = 'block';
        //         //  console.log(developersList.value)
        //     }

        // });
    </script>
@endsection
