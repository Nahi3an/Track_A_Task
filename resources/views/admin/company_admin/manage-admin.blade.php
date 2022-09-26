@extends('admin.master')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Manage Company Admin</h2>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <h6 class="text-success fw-bold">{{ session('message') }}</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Admin Name</th>
                            <th>Address</th>
                            <th>Company Email</th>
                            <th>Phone</th>
                            <th>Company Name</th>
                            <th>Image</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($companyAdmins as $companyAdmin)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $companyAdmin->first_name . ' ' . $companyAdmin->last_name }}</td>
                                <td>{{ $companyAdmin->address }}</td>
                                <td>{{ $companyAdmin->email }}</td>
                                <td>{{ $companyAdmin->phone }}</td>
                                <td>{{ $companyAdmin->company_name }}</td>
                                <td><img src="{{ asset($companyAdmin->image) }}" style="height: 70px; width:70px"></td>
                                <td>
                                    <a href="{{ route('edit.company.admin', ['companyAdmin' => $companyAdmin->id]) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form action="" method="POST"
                                        onclick=" return confirm('You will erase all informations related to this Company (Comapny_Admin, Task, Employee ..) to this record!! Continue? ')">
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
