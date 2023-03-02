@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Company List</h2>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-2">
        <a class="btn btn-success pull-left" href="{{ route('company.create') }}"> Add Company</a>
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
            <th>Add Users</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->company_name }}</td>
            {{-- <td><a class="btn btn-primary" href="{{ route('company.edit',$company->id) }}">Add Users</a></td> --}}
            <td><button type="button" class="btn btn-primary m-2 getdata" data-toggle="modal" attr-companyid="{{ $company->id }}">Add Users</button></td>
            <td><a class="btn btn-warning" href="{{ route('company.edit',$company->id) }}">Edit</a></td>
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


    <!-- Modal Example Start-->
			<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
                    <form action="{{ route('user.attachusers') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="demoModalLabel">User Listing</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria- 
                                    label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body" id="resultset">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
	 <!-- Modal Example End-->
@endsection