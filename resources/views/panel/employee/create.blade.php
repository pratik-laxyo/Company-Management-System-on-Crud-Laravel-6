@extends('panel.employee.layout.layout')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Add Employee</h2>
	        </div>
	        <div class="float-right">
	            <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	   
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <strong>Warning!</strong> Please check your input code<br><br>
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	   
	<form action="{{ route('employee.store') }}" method="POST">
	    @csrf
	    <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>First Name:</strong>
	                <input type="text" name="first_name" class="form-control" placeholder="First Name">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Last Name:</strong>
	                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Company:</strong>
	                <select name="company" class="form-control">
	                	<option disabled="" selected="">Select</option>
	                	@foreach ($companys as $company)
	                		<option value="{{ $company->id }}">{{ $company->name }}</option>
	                	@endforeach
	                </select>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Email:</strong>
	                <input type="text" name="email" class="form-control" placeholder="Email">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Phone No.:</strong>
	                <input type="text" name="phone" class="form-control" placeholder="Phone No.">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
	                <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
	   
	</form>
@endsection