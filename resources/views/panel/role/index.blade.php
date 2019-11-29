@extends('panel.role.layout.layout')
 
@section('content')

		<div class="row">
	    	<div class="col-md-12">
	        	<a class="float-right btn btn-success" href="{{ route('role.create') }}"> Create new Roles</a>
	      </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Roles Listing</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered" id="student_table">
        <thead>
        <tr>
            <th>No</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        </thead>

        @if (!empty($roles))
        @foreach ($roles as $row)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $row->name }}</td>
            <td>
                <form action="{{ route('role.destroy',$row->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('role.edit',$row->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else 
            <div class="">
                <p>No records available</p>
            </div>
        @endif
    </table>
    {!! $roles->links() !!}
@endsection
