<?php

namespace App\Exports;

use App\employee;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;

class EmployeeExport implements FromQuery, WithHeadings ,WithMapping
{
     public function query()
    {
    		$data = Employee::with('company_name');
    		return $data;
    }
    public function map($employee): array
    {
    	return [ 
    		$employee->first_name,
    		$employee->last_name,
    		$employee['company_name']->name,
    		$employee->email,
    		$employee->phone 
      ];
    }
    public function headings(): array
    {
        return ['First Name','Last Name','Company','Email','Phone'];
    }
}