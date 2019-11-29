@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ (auth()->user()->id == 1) ? 'Admin' : 'Employee' }} Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
									@role('Admin')
                    <ul>
                    		<li><a href="{{'role'}}">Role</a></li>
                        <li><a href="{{'company'}}">Company</a></li>
                        <li><a href="{{'employee'}}">Employee</a></li>
                    </ul>
                  @endrole

                  @role('Employee')
                  	<ul>
                    		<li><a href="{{'company'}}">Company</a></li>
                        <li><a href="{{ route('show',auth()->user()->id) }}">Employee</a></li>
                    </ul>
                  @endrole

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
