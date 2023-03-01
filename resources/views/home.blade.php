@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-success" href="{{ route('company.index') }}">Company Listing</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('user.index') }}">User Listing</a>
        </div>
    </div>
</div>
@endsection