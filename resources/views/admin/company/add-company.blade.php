@extends('admin.master')
@section('content')
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                <h2 class="card-title">Company Registration Form</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  pt-0">
                                <h6 class="text-success fw-bold">{{ session('message') }}</h6>
                                <form action="{{ route('new.company') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">
                                            <div class="card-body  pt-0">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter Company Name" name="company_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Address</label>
                                                    <textarea type="text" name="address" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter Company Address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter Company Email" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Website Url</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter Website Url" name="website_url">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Country</label>
                                                    <select name="country_id" class="form-control">
                                                        <option> Not Selected </option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>


                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="submit" value="Register Company"
                                                        class="btn btn-primary btn-lg">
                                                </div>

                                            </div>

                                        </div>


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
