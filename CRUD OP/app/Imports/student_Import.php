<?php

namespace App\Imports;

use App\student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class student_Import implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new student([
            "name"=>$row["name"],
            "age"=>$row["age"],
            "street"=>$row["street"],
            "email"=>$row["email"],
            "date"=>$row["date"]
        ]);
    }
}
