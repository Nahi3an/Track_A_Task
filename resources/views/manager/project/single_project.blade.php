@extends('manager.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="single-project container-fluid row">

                <div class="col-md-7 mt-2 p-3" style="box-shadow: -6px 5px 13px #343a40;">
                    <h5 class="text-primary">Project Description:</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="fw-bold">Project ID</h6>
                        </div>
                        <div class="col-md-9">
                            <h6>{{ $singleProjectInfo->project_id }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="fw-bold">Project Title</h6>
                        </div>
                        <div class="col-md-9">
                            <h6>{{ $singleProjectInfo->title }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="fw-bold">Project Description</h6>
                        </div>
                        <div class="col-md-9">
                            <h6>{{ $singleProjectInfo->description }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="fw-bold">Project Assigned</h6>
                        </div>
                        <div class="col-md-9">
                            <h6>{{ $singleProjectInfo->created_at }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="fw-bold">Project Deadline</h6>
                        </div>
                        <div class="col-md-9">
                            <h6>{{ $singleProjectInfo->deadline }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="fw-bold">Project Status</h6>
                        </div>
                        <div class="col-md-9">
                            @if ($singleProjectInfo->status == 0)
                                <h6>Not Completed</h6>
                            @elseif($singleProjectInfo->status == 1)
                                <h6>Completed</h6>
                            @endif

                            <div class="row">
                                <div class="col-md-2"><a href="{{ route('project.edit', $singleProjectInfo->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a></div>
                                <div class="col-md-2"><a href="#" class="btn btn-sm btn-danger">Delete</a></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-5 mt-2 p-3 " style="box-shadow: -6px 5px 13px #343a40;">
                    <h5 class="text-primary">Project Developer Team:</h5>
                    @foreach ($developers as $developer)
                        <div class="row">
                            <div class="col-md-2"><span class="fw-bold">ID: </span>{{ $developer['id'] }}</div>

                            <div class="col-md-10"><span class="fw-bold">Full Name:
                                </span>{{ $developer['first_name'] . ' ' . $developer['last_name'] }}
                            </div>

                        </div>
                    @endforeach



                    <h5 class="text-primary mt-2">Project Tester Team:</h5>
                    @foreach ($testers as $tester)
                        <div class="row">
                            <div class="col-md-2"><span class="fw-bold">ID: </span>{{ $tester['id'] }}</div>

                            <div class="col-md-10"><span class="fw-bold">Full Name:
                                </span>{{ $tester['first_name'] . ' ' . $tester['last_name'] }}
                            </div>

                        </div>
                    @endforeach


                </div>


            </div>
        </section>
    </div>
@endsection
