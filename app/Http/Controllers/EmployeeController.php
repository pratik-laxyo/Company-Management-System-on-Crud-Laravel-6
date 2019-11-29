<?php

namespace App\Http\Controllers;

use App\employee;
use App\company;
use App\User;
use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Yajra\DataTables\DataTables;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;

class EmployeeController extends Controller
{
	

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        $companys = Company::get();
        return view('panel.employee.index',compact('employees','companys'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = Company::get();
        return view('panel.employee.create',compact('companys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|same:cpassword'
        ]);
  	
  			$userTable = [
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $user = User::create($userTable);
        $LastInsertId = $user->id;
        if(!empty($LastInsertId)){
		        $employeeTable = [
		            'first_name' => $request->first_name,
		            'last_name' => $request->last_name,
		            'company' => $request->company,
		            'email' => $request->email,
		            'phone' => $request->phone,
		            'user_id' => $LastInsertId
		        ];
		        Employee::create($employeeTable);
		    }

        $details = [
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'phone' => $request->phone
        ];

        \Mail::to('pratik@laxyo.org')->send(new SendMail($details));
   
        return redirect()->route('employee.index')->with('success','Employee Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee, $id)
    {
    		$employees = employee::where('user_id',$id)->get();
    		$employee = $employees[0];
        return view('panel.employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        $companys = Company::get();
        return view('panel.employee.edit',compact('employee','companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $userTable = [
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email
        ];
  			
  			$user = User::find($request->user_id);
        $user->update($userTable);
        $employee->update($request->all());

  
        return redirect()->route('employee.index')->with('success','Employee details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
    		$employee->delete();
        User::find($employee->user_id)->delete();
        return redirect()->route('employee.index')->with('success','Employee record deleted successfully');
    }

    public function export() 
    {
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }

    public function import() 
    {
    		Excel::import(new EmployeeImport,request()->file('file'));
        return back();
    }

    public function role(employee $employee, $id)
    {
    		$employee = employee::find($id);
    		$roles = Role::get();
        return view('panel.employee.role',compact('employee','roles'));
    }

    public function roleUpdate(Request $request, employee $employee, $id){
    		$request->validate([
            'role_id' => 'required'
        ]);
        $employeeTable = [
            'role_id' => $request->role_id
        ];
    		$employee = employee::find($id);
    		$employee->update($employeeTable);
    		$user = $employee->user_id;
    		$user = User::find($user);
    		$user->assignRole('Employee');
				return redirect()->route('employee.index')->with('success','Employee Role updated successfully');
    }
}
