@extends('admin.master')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Manage Company </h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Website Link</th>
                            <th>Country Name</th>
                            <th>Country Code</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->email }}</td>
                                <td><a href="{{ $company->website_url }}">{{ $company->website_url }}</a></td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->code }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6"> <a href="{{ route('edit.company', ['id' => $company->id]) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="#" method="POST">
                                                @csrf
                                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                            </form>
                                        </div>
                                    </div>
            </div>

            </td>
            </tr>
            @endforeach


            </tbody>
            </table>
        </div>

    </div>
    </div>
@endsection
