<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\Importable;

class CompaniesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Adjust the index based on the Excel structure
        return new Company([
            'name'   => $row[0], // Assuming 'name' is in the first column
            'region' => $row[1],
            'email'  => $row[2], 
            'domain' => $row[3],
            'city'   => $row[4] ?? null, // Optional column
            'phone'  => $row[5] ?? null, // Optional column

        ]);
    }
}
