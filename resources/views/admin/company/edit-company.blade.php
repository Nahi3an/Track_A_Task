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
                                <h2 class="card-title">Edit Company Information</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  pt-0">
                                <h6 class="text-success fw-bold">{{ session('message') }}</h6>
                                <form action="{{ route('update.company', ['company' => $company->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">
                                            <div class="card-body pt-0">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        name="company_name" value="{{ $company->company_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Address</label>
                                                    <textarea type="text" name="address" class="form-control" id="exampleInputEmail1">{{ $company->address }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        name="email" value="{{ $company->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Website Url</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        name="website_url" value="{{ $company->website_url }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Country</label>
                                                    <select name="country_id" class="form-control">
                                                        <option value="{{ $company->country->id }}">
                                                            {{ $company->country->name }} </option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>


                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="submit" value="Update Company Info"
                                                        class="btn btn-primary btn">
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
