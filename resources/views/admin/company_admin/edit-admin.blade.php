@extends('admin.master')
@section('content')
    <div class="content-wrapper">

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Edit Admin Info </h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-2">
                                <h6 class="text-success fw-bold">{{ session('message') }}</h6>
                                <form action="{{ route('update.company.admin', ['companyAdmin' => $companyAdmin->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">
                                            <div class="card-body pt-0">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Profile Picture</label> <br>
                                                    <img src="{{ asset($companyAdmin->image) }}"
                                                        style="height: 110px; width:110px">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        name="first_name" value="{{ $companyAdmin->first_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        value="{{ $companyAdmin->last_name }}" name="last_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        id="exampleInputEmail1"value="{{ $companyAdmin->phone }}">

                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputFile">Change Profile Picture</label> <br>
                                                    <input type="file" name="image">

                                                </div>



                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select Company</label>
                                                <select name="company_id" class="form-control">
                                                    <option value="{{ $companyAdmin->company->id }}">
                                                        {{ $companyAdmin->company->company_name }} </option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->company_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Designated Email</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    value="{{ $companyAdmin->email }}" name="email">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <textarea type="text" name="address" class="form-control" id="exampleInputEmail1">{{ $companyAdmin->address }}
                                                </textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" value="Update Admin Info" class="btn btn-primary btn-lg">
                                    </div>

                                </form>
                            </div>
                            <!-- /.row -->
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
