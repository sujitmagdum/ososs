@extends('layouts.main')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="mt-5 text-center">
    <a class="btn btn-success" href="{{ route('company.index') }}">Company Listing</a>
    <a class="btn btn-primary" href="{{ route('user.index') }}">User Listing</a>
</div>
@endsection