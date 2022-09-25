@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-2 text-primary">Add Company Admin</h3>
                    </div>

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('new.company.admin') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-0 text-secondary">Company Admin Information Form</h4>
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">
                                            <div class="card-body">
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
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter Last Name" name="last_name">
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
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Profile Picture</label>
                                                    <input type="file" style="border:none" class="form-control"
                                                        id="exampleInputFile">
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="m-0 text-secondary">Company Information Form</h4>

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Name</label>
                                                    <input type="text" name="company_name" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Company Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Website Link</label>
                                                    <input type="text" name="website_url" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Website Link ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Address</label>
                                                    <textarea type="text" name="company_address" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Company Address">
                                                    </textarea>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- /.card-body -->

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
