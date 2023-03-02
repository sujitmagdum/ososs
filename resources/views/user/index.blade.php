@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User List</h2>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-2">
            <a class="btn btn-success pull-left" href="{{ route('user.create') }}"> Add User</a>
            <a class="btn btn-primary pull-right ml-2" href="{{ route('dashboard.index') }}"> Back</a>
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
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td> <a class="btn btn-warning" href="{{ route('user.edit',$user->id) }}">Edit</a></td>
            <td>
                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $users->links() !!}
@endsection