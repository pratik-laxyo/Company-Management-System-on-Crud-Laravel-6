<?php

namespace App\Http\Controllers;

use App\employee;
use App\company;
use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Yajra\DataTables\DataTables;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;


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
        //return view('panel.employee.index');
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
            'email' => 'required',
            'phone' => 'required'
        ]);
  
        Employee::create($request->all());

        $details = [
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'phone' => $request->phone
        ];

        //return $details;

        \Mail::to('pratik@laxyo.org')->send(new SendMail($details));
   
        return redirect()->route('employee.index')->with('success','Employee Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //return view('employee.show',compact('employee'));
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

}
