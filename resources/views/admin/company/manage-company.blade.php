@extends('admin.master')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Manage Company </h2>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <h6 class="text-success fw-bold">{{ session('message') }}</h6>
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
                                <td>{{ $i++ }}</td>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->email }}</td>
                                <td><a href="{{ $company->website_url }}">{{ $company->website_url }}</a></td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->code }}</td>
                                <td>
                                    <a href="{{ route('edit.company', ['company' => $company->id]) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('delete.company', ['company' => $company->id]) }}"
                                        method="POST"
                                        onclick=" return confirm('Are You Sure You Want To Delete This Record?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
