@extends('panel.company.layout.layout')
@section('content')
    
    @foreach ($company as $row)
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12 margin-tb">
            		@role('Admin')
                <div class="float-left">
                    <a class="btn btn-primary" href="{{ ('/home') }}"> Back</a>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('company.edit',$row->id) }}"> Update</a>
                </div>
                @endrole
                @role('Employee')
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ ('/home') }}"> Back</a>
                </div>
                @endrole
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Company Info</div>
                    <div class="row p-5">  
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <img src="{{ url('storage/').trim($row->logo,'public') }}" style="margin-left: 44%;border-radius: 100px;border: 3px solid cornflowerblue;width: 150px;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Company Name :</strong>
                                {{ $row->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $row->email }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Website:</strong>
                                {{ $row->website }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @endforeach
@endsection