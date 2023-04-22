<?php

namespace App\Exports;

use App\Models\data;
use Maatwebsite\Excel\Concerns;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $CompanyID;
    public function __construct($CompanyID)
    {
        $this->CompanyID=$CompanyID;
    }
    public function collection()
    {
        return data::select('id','data_1','data_2','created_at')->
        where('company_id',$this->CompanyID)->get();
    }
    public function headings(): array
    {
        // Define your column headings here
        return [
            'id',
            'اسم العميل',
            'رقم العميل',
            'تاريخ التسجيل',

            // Add more column headings as needed
        ];
    }
}
