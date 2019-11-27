<?php

namespace App\Imports;

use App\employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'first_name'   => $row[0],
            'last_name'   => $row[1],
            'company'   => $row[2],
            'email'    => $row[3], 
            'phone' => $row[4],
        ]);
    }
}
