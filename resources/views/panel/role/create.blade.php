@extends('panel.role.layout.layout')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Add Roles</h2>
	        </div>
	        <div class="float-right">
	            <a class="btn btn-primary" href="{{ route('role.index') }}"> Back</a>
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
	   
	<form action="{{ route('role.store') }}" method="POST">
	    @csrf
	    <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Role Type:</strong>
	                <input type="text" name="name" class="form-control" placeholder="Role Name">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Permission:</strong>
			            <br/>
			            @foreach($permission as $value)
			                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
			                {{ $value->name }}</label>
			            <br/>
			            @endforeach
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
	                <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
	   
	</form>
@endsection