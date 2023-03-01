@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Company List</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('company.create') }}"> Add Company</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Add Users</th>
            <th>Edit</th>
            <th>Delete</th>
            {{-- <th width="280px">Action</th> --}}

        </tr>

        @foreach ($companies as $company)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $company->company_name }}</td>
            <td>{{ $company->company_name }}</td>
            {{-- <td><a class="btn btn-primary" href="{{ route('user.list',$company->id) }}">Add User</a></td> --}}
            <td> <a class="btn btn-primary" href="{{ route('company.edit',$company->id) }}">Edit</a></td>
            <td>
                <form action="{{ route('company.destroy',$company->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $companies->links() !!}

      

@endsection