@extends('developer.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <div class="row mt-3 ms-1" style="margin-right: 0px">
            <h4>Task History:</h4>
            <div class="col-md-6 ">
                <h5>Development & Testing Tasks:</h5>
                <div class="development-testing small-box ">
                    <div class="list-group">

                        @foreach ($devTestTasks as $task)
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <div class=" w-100 justify-content-between">
                                    <span>Task ID: {{ $task['task_id'] }}</span>
                                    <h5 class="mb-1 fw-bold">{{ $task['title'] }}</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-7"><span class="">Tags: {{ $task['tags'] }}</span>
                                    </div>

                                    <div class="col-md-5"><span class=" ">3 DAYS AGO</span>
                                    </div>
                                    {{-- <span class="badge bg-primary">{{ $task['tags'] }}</span>
                                    <span class="badge bg-primary rounded-pill"> {{ $task['deadline'] }}</span> --}}


                                </div>
                                <div class="row">
                                    <div class="col-md-7"><span class=" ">Assgined On: <br>
                                            {{ $task['created_at'] }}</span>
                                    </div>

                                    <div class="col-md-5"><span class=" ">Deadline: <br>{{ $task['deadline'] }}</span>
                                    </div>
                                    {{-- <span class=" bg-primary">{{ $task['tags'] }}</span>
                                    <span class=" bg-primary rounded-pill"> {{ $task['deadline'] }}</span> --}}


                                </div>
                                {{-- <p class="mb-1">Some placeholder content in a paragraph.</p>
                                <small>And some small print.</small> --}}
                            </a>
                        @endforeach

                        {{-- <a href="#" class="list-group-item list-group-item-action">
                            <div class=" w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                            <small class="text-muted">And some muted small print.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class=" w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Some placeholder content in a paragraph.</p>
                            <small class="text-muted">And some muted small print.</small>
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6  bg-light">
                <h5>Development Tasks:</h5>
                <div class="development small-box">
                    <div class="list-group">
                        @foreach ($devTasks as $task)
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <div class=" w-100 justify-content-between">
                                    <span>Task ID: {{ $task['task_id'] }}</span>
                                    <h5 class="mb-1 fw-bold">{{ $task['title'] }}</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-7"><span class="">Tags: {{ $task['tags'] }}</span>
                                    </div>

                                    <div class="col-md-5"><span class=" ">3 DAYS AGO</span>
                                    </div>
                                    {{-- <span class="badge bg-primary">{{ $task['tags'] }}</span>
                                    <span class="badge bg-primary rounded-pill"> {{ $task['deadline'] }}</span> --}}


                                </div>
                                <div class="row">
                                    <div class="col-md-7"><span class=" ">Assgined On: <br>
                                            {{ $task['created_at'] }}</span>
                                    </div>

                                    <div class="col-md-5"><span class=" ">Deadline: <br>{{ $task['deadline'] }}</span>
                                    </div>
                                    {{-- <span class=" bg-primary">{{ $task['tags'] }}</span>
                                    <span class=" bg-primary rounded-pill"> {{ $task['deadline'] }}</span> --}}


                                </div>
                                {{-- <p class="mb-1">Some placeholder content in a paragraph.</p>
                                <small>And some small print.</small> --}}
                            </a>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>

        <div class="row mt-3 ms-1" style="margin-right: 0px">
            <h4>Project History</h4>
            <div class="col-md-6">
                <div class="development-testing small-box ">
                    <div class="list-group">
                        @foreach ($projectInfo as $project)
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <div class=" w-100 justify-content-between">
                                    <span>Project ID: {{ $project['project_id'] }}</span>
                                    <h5 class="mb-1 fw-bold">{{ $project['title'] }}</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-7"><span class="">Status: {{ $project['status'] }}</span>
                                    </div>

                                    <div class="col-md-5"><span class=" ">3 DAYS AGO</span>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-7"><span class=" ">Project Started: <br>
                                            {{ $project['created_at'] }}</span>
                                    </div>

                                    <div class="col-md-5"><span class=" ">Project Deadline:
                                            <br>{{ $project['deadline'] }}</span>
                                    </div>
                                    {{-- <span class=" bg-primary">{{ $task['tags'] }}</span>
                                <span class=" bg-primary rounded-pill"> {{ $task['deadline'] }}</span> --}}


                                </div>
                                {{-- <p class="mb-1">Some placeholder content in a paragraph.</p>
                            <small>And some small print.</small> --}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->

    <!-- /.content -->
    </div>

    <script></script>
@endsection
