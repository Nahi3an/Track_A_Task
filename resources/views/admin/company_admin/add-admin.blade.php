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
                                <h2 class="card-title">Admin Registration Form</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-2">
                                <h6 class="text-success fw-bold">{{ session('message') }}</h6>
                                <form action="{{ route('new.company.admin') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">
                                            <div class="card-body pt-0">

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter First Name" name="first_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter Last Name" name="last_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Enter Last Name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Profile Picture</label>
                                                    <input type="file" name="image" style="border:none"
                                                        class="form-control" id="exampleInputFile">
                                                </div>


                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select Company</label>
                                                <select name="company_id" class="form-control">
                                                    <option> Not Selected </option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->company_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Designated Email</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Company Designated Email" name="email">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <textarea type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Personal Address">
                                                </textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" value="Register Admin" class="btn btn-primary btn-lg">
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
