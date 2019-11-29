@extends('panel.employee.layout.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee Detail</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ ('/home') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <form action="" method="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" placeholder="First Name" readonly="" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" placeholder="Last Name" readonly="" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company:</strong>
                    <input type="text" name="last_name" value="{{ $employee->company_name->name }}" class="form-control" placeholder="Last Name" readonly="" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $employee->email }}" class="form-control" placeholder="Email" readonly="" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone No.:</strong>
                    <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" placeholder="Phone No." readonly="" >
                </div>
            </div>
        </div>
    </form>
@endsection