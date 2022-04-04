@extends('manager.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Welcome {{ $manager->first_name . ' ' . $manager->last_name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Manager Dashboard</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Task Create -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>Project Created</p>
                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                        data-target="#exampleModal">Create Project <i class="fas fa-plus-circle"></i>
                                    </button>
                                    <!-- Modal -->

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    <form method="POST" action="">
                                                        @csrf

                                                        <div class="row mb-3">
                                                            <label for="project"
                                                                class="col-md-4 col-form-label text-md-end">{{ __('Project Title') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="project" type="text"
                                                                    class="form-control @error('project') is-invalid @enderror"
                                                                    name="project" value="{{ old('project') }}" required
                                                                    autocomplete="project" autofocus>

                                                                @error('project')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="project_description"
                                                                class="col-md-2 col-form-label text-md-end">{{ __('Project Description') }}</label>

                                                            <div class="col-md-10">
                                                                <textarea id="project_description" type="text" class="form-control @error('project_description') is-invalid @enderror"
                                                                    name="project_description" required
                                                                    autocomplete="project_description"
                                                                    autofocus>{{ old('project_description') }}</textarea>

                                                                @error('project_description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <div class="row mb-2">
                                                                    {{-- <label for="developer_id_one "
                                                                        class="col-md-4 col-form-label text-md-end"><small>{{ __('Developer 1') }}</small></label>
                                                                    <br> --}}
                                                                    <div class="col-md">
                                                                        <label for="developer_id_one"
                                                                            class="form-label">{{ __('Developer 1') }}</label><br>

                                                                        <select id="developer_id_one" type="text"
                                                                            class="form-control @error('developer_id_one') is-invalid @enderror"
                                                                            name="developer_id_one"
                                                                            value="{{ old('developer_id_one') }}" required
                                                                            autocomplete="developer_id_one" autofocus
                                                                            style="color: black">

                                                                            <option value="not_selected">Not Selected
                                                                            </option>

                                                                            @foreach ($developers as $developer)
                                                                                {{ $name = $developer->first_name . ' ' . $developer->last_name . ' (id: ' . $developer->id . ')' }}
                                                                                @if (old('developer_id_one') == $developer->id)
                                                                                    <option
                                                                                        value="{{ $developer->first_name }} "
                                                                                        selected>
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $developer->id }}">
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach

                                                                        </select>
                                                                        @error('developer_id_one')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-md">
                                                                        <label for="developer_id_two"
                                                                            class="form-label">{{ __('Developer 2') }}</label><br>
                                                                        <select id="developer_id_two" type="text"
                                                                            class="form-control @error('developer_id_two') is-invalid @enderror"
                                                                            name="developer_id_two"
                                                                            value="{{ old('developer_id_two') }}"
                                                                            required autocomplete="developer_id_two"
                                                                            autofocus>

                                                                            <option value="not_selected">Not Selected
                                                                            </option>

                                                                            @foreach ($developers as $developer)
                                                                                {{ $name = $developer->first_name . ' ' . $developer->last_name . ' (id: ' . $developer->id . ')' }}
                                                                                @if (old('developer_id_one') == $developer->id)
                                                                                    <option
                                                                                        value="{{ $developer->first_name }} "
                                                                                        selected>
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $developer->id }}">
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach

                                                                        </select>
                                                                        @error('developer_id_two')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md">
                                                                        <label for="developer_id_three"
                                                                            class="form-label">{{ __('Developer 3') }}</label><br>

                                                                        <select id="developer_id_three" type="text"
                                                                            class="form-control @error('developer_id_three') is-invalid @enderror"
                                                                            name="developer_id_three"
                                                                            value="{{ old('developer_id_three') }}"
                                                                            required autocomplete="developer_id_three"
                                                                            autofocus>

                                                                            <option value="not_selected">Not Selected
                                                                            </option>
                                                                            @foreach ($developers as $developer)
                                                                                {{ $name = $developer->first_name . ' ' . $developer->last_name . ' (id: ' . $developer->id . ')' }}
                                                                                @if (old('developer_id_one') == $developer->id)
                                                                                    <option
                                                                                        value="{{ $developer->first_name }} "
                                                                                        selected>
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $developer->id }}">
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach

                                                                        </select>
                                                                        @error('developer_id_three')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="row mb-2">
                                                                    {{-- <label for="developer_id_one "
                                                                        class="col-md-4 col-form-label text-md-end"><small>{{ __('Developer 1') }}</small></label>
                                                                    <br> --}}
                                                                    <div class="col-md">
                                                                        <label for="tester_id_one"
                                                                            class="form-label">{{ __('Tester 1') }}</label><br>

                                                                        <select id="tester_id_one" type="text"
                                                                            class="form-control @error('tester_id_one') is-invalid @enderror"
                                                                            name="tester_id_one"
                                                                            value="{{ old('tester_id_one') }}" required
                                                                            autocomplete="tester_id_one" autofocus>

                                                                            <option value="not_selected">Not Selected
                                                                            </option>

                                                                            @foreach ($testers as $tester)
                                                                                {{ $name = $tester->first_name . ' ' . $tester->last_name . ' (id: ' . $tester->id . ')' }}
                                                                                @if (old('tester_id_one') == $tester->id)
                                                                                    <option
                                                                                        value="{{ $tester->first_name }} "
                                                                                        selected>
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $tester->id }}">
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        @error('tester_id_one')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-md">
                                                                        <label for="tester_id_two"
                                                                            class="form-label">{{ __('Tester 2') }}</label><br>
                                                                        <select id="tester_id_two" type="text"
                                                                            class="form-control @error('tester_id_two') is-invalid @enderror"
                                                                            name="tester_id_two"
                                                                            value="{{ old('tester_id_two') }}" required
                                                                            autocomplete="tester_id_two" autofocus>

                                                                            <option value="not_selected">Not Selected
                                                                            </option>

                                                                            @foreach ($testers as $tester)
                                                                                {{ $name = $tester->first_name . ' ' . $tester->last_name . ' (id: ' . $tester->id . ')' }}
                                                                                @if (old('tester_id_one') == $tester->id)
                                                                                    <option
                                                                                        value="{{ $tester->first_name }} "
                                                                                        selected>
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $tester->id }}">
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        @error('tester_id_two')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md">
                                                                        <label for="tester_id_three"
                                                                            class="form-label">{{ __('Tester 3') }}</label><br>

                                                                        <select id="tester_id_three" type="text"
                                                                            class="form-control @error('tester_id_three') is-invalid @enderror"
                                                                            name="tester_id_three"
                                                                            value="{{ old('tester_id_three') }}" required
                                                                            autocomplete="tester_id_three" autofocus>

                                                                            <option value="not_selected">Not Selected
                                                                            </option>

                                                                            @foreach ($testers as $tester)
                                                                                {{ $name = $tester->first_name . ' ' . $tester->last_name . ' (id: ' . $tester->id . ')' }}
                                                                                @if (old('tester_id_one') == $tester->id)
                                                                                    <option
                                                                                        value="{{ $tester->first_name }} "
                                                                                        selected>
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $tester->id }}">
                                                                                        {{ $name }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        @error('tester_id_three')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="deadline"
                                                                class="col-md-4 col-form-label text-md-end">{{ __('Project Deadline') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="deadline" type="date"
                                                                    class="form-control @error('deadline') is-invalid @enderror"
                                                                    name="deadline" value="{{ old('deadline') }}"
                                                                    required autocomplete="deadline" autofocus>

                                                                @error('deadline')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                </div>


                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="icon">
                                <i class="icon ion-hammer"></i>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            </div>
            <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
