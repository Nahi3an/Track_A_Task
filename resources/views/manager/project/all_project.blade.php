@extends('manager.layouts.app')

@section('content')
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">

            <!-- Select Project ID -->
            <div class="row container-fluid  mt-4">

                <div class="col-md-9  border-primary">

                    <div class="all-projects">
                        {{-- <span class="fw-bold">Sorted By:
                            @if ($key == 'not_selected')
                                No Filter
                            @elseif ($key == 'oldtonew')
                                Oldest To Newest
                            @elseif ($key == 'newtoold')
                                Newest To Oldest
                            @elseif ($key == 'nearestbydeadline')
                                Nearest Deadline
                            @elseif ($key == 'farthestbydeadline')
                                Farthest Deadline
                            @elseif ($key == 'completed')
                                Completed Projects
                            @elseif ($key == 'notcompleted')
                                Not Completed Projects
                            @endif
                        </span> --}}
                        <table class="table table-hover table-bordered border-primary mt-2">
                            <thead>
                                <tr>

                                    <th scope="col">Project ID</th>
                                    <th scope="col">Project Title</th>
                                    <th scope="col">Project Description</th>
                                    <th scope="col">Project Assigned</th>
                                    <th scope="col">Project Deadline</th>
                                    <th scope="col">Project Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($allProjects) > 0)
                                    @foreach ($allProjects as $project)
                                        <tr>

                                            <td>{{ $project->project_id }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->created_at }}</td>
                                            <td>{{ $project->deadline }}</td>
                                            @if ($project->status == 0)
                                                <td>Not Completed</td>
                                            @elseif($project->status == 1)
                                                <td>Completed</td>
                                            @endif

                                        </tr>
                                    @endforeach
                                @else
                                    <p>No Projects Found</p>
                                @endif





                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col-md-3">

                    <form method="GET" action="{{ route('project.show', $key) }}">
                        <label>Filter By </label>

                        <select name="key" class="form-select">

                            <option value="not_selected" {{ $key == 'not_selected' ? 'selected' : '' }}>None
                            </option>
                            <option value="oldtonew" {{ $key == 'oldtonew' ? 'selected' : '' }}>Oldest</option>
                            <option value="newtoold" {{ $key == 'newtoold' ? 'selected' : '' }}>Newest</option>
                            <option value="nearestbydeadline" {{ $key == 'nearestbydeadline' ? 'selected' : '' }}>
                                Nearest Deadline
                            </option>
                            <option value="farthestbydeadline" {{ $key == 'farthestbydeadline' ? 'selected' : '' }}>
                                Farthest Deadline
                            </option>
                            <option value="completed" {{ $key == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="notcompleted" {{ $key == 'notcompleted' ? 'selected' : '' }}>Not
                                Completed</option>


                        </select>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Filter</button>


                    </form>
                </div>


            </div>
        </section>
    </div>
@endsection
