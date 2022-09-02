@extends('manager.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="single-project container-fluid mt-2 p-3" style="box-shadow: 4px 5px 13px #343a40;">

                <form action="{{ route('project.update', $singleProjectInfo->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label for="projectTitle" class="form-label">
                                <h6 class="fw-bold">Project Title</h6>
                            </label>

                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="projectTitle" name="title"
                                value="{{ $singleProjectInfo->title }}">

                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label for="projectDescription" class="form-label">
                                <h6 class="fw-bold">Project Description</h6>
                            </label>

                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" type="text" id="projectDescription" name="description">{{ $singleProjectInfo->description }}</textarea>

                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label class="form-label">
                                <h6 class="fw-bold">Project Deadline</h6>
                            </label>

                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="text" value="{{ $singleProjectInfo->deadline }}" disabled>
                            <input class="form-control" type="text" name="old_deadline"
                                value="{{ $singleProjectInfo->deadline }}" hidden>

                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label for="projectDeadline" class="form-label">
                                <h6 class="fw-bold">New Project Deadline</h6>
                            </label>

                        </div>
                        <div class="col-md-9">
                            <input id="projectDeadline" type="date" class="form-control" name="new_deadline">
                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('project.getInfo', $singleProjectInfo->id) }}"
                                        class="btn btn-sm btn-danger">Cancel</a>
                                </div>

                            </div>
                        </div>

                    </div>


                </form>

            </div>
        </section>
    </div>
@endsection
