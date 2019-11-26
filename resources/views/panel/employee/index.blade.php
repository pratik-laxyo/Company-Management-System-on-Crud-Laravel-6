@extends('panel.employee.layout.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee Listing</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Create new employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a> --}}
    <table class="table table-bordered" id="student_table">
        <thead>
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone No.</th>
            <th>Action</th>
        </tr>
        </thead>

        @if (!empty($employees))
        @foreach ($employees as $row)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $row->first_name }}</td>
            <td>{{ $row->last_name }}</td>
            @foreach ($companys as $company)
                @if ($row->company == $company->id)
                    <td>{{ $company->name }}</td>
                @else
                    <td>N/A</td>
                @endif
            @endforeach
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>
                <form action="{{ route('employee.destroy',$row->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('employee.edit',$row->id) }}">Edit</a>
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
    {!! $employees->links() !!}
@endsection
