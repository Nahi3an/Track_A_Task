@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Company Admin</h1>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="m-0">Company Admin Information Form</h3>
                                        <form action="{{ route('new.company.admin') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Upload Image</label>
                                                    <input type="file" style="border:none" class="form-control"
                                                        id="exampleInputFile">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Add Admin" class="btn btn-sm btn-primary">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->




                                </div>
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
