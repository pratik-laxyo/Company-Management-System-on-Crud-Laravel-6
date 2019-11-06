@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
               <!--  {{ auth()->user()->name }} -->
                 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="{{'company'}}">Company</a></li>
                        <li><a href="{{'employee'}}">Employee</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
