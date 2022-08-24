@extends('manager.layouts.app')

@section('content')
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">

            <!-- Select Project ID -->
            <div class="row container-fluid  mt-4">

                <div class="col-md-9  border-primary">

                    <div class="all-projects">

                        <table class="table table-hover table-bordered border-primary">
                            <thead>
                                <tr>

                                    <th scope="col">Project ID</th>
                                    <th scope="col">Project Title</th>
                                    <th scope="col">Project Description</th>
                                    <th scope="col">Project Deadline</th>
                                    <th scope="col">Project Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProjects as $project)
                                    <tr>

                                        <td>{{ $project->project_id }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>{{ $project->deadline }}</td>
                                        @if ($project->status == 0)
                                            <td>Not Completed</td>
                                        @elseif($project->status == 1)
                                            <td>Completed</td>
                                        @endif

                                    </tr>
                                @endforeach




                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col-md-3">

                    <form method="GET" action="{{ route('project.show', $key) }}">
                        <label>Filter By </label>
                        <select name="key" class="form-select">
                            <option value="not_selected">No Filter</option>
                            <option value="oldtonew">Old To New</option>
                            <option value="newtoold">New To Old</option>
                            <option value="nearestbydeadline">Nearest Deadline</option>
                            <option value="farthestbydeadline">Farthest Deadline</option>
                            <option value="completed">Completed</option>
                            <option value="notcompleted">Not Completed</option>
                        </select>
                        <button type="submit">Filter</button>


                    </form>
                </div>


            </div>
        </section>
    </div>
@endsection
