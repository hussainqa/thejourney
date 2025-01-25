<?php

namespace App\Exports;

use App\Models\data;
use Maatwebsite\Excel\Concerns;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DataDateExport implements FromCollection, WithHeadings, WithColumnWidths ,WithMapping ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $CompanyID;
    protected $start_date;
    protected $end_date;
    public function __construct($start_date,$end_date,$CompanyID)
    {
        $this->CompanyID=$CompanyID;
        $this->start_date=$start_date;
        $this->end_date=$end_date;

    }
    public function collection()
    {
        $counter = 1; // Initialize the counter

        return Data::select('data_1', 'data_2', 'created_at')
            ->where('company_id', $this->CompanyID)
            ->whereDate('created_at', '>=', $this->start_date)
            ->whereDate('created_at', '<=', $this->end_date)
            ->get()
            ->map(function ($row) use (&$counter) {
                $row['index'] = $counter++; // Assign the index and increment the counter
                return $row;
            });

    }
    public function headings(): array
    {
        // Define your column headings here
        return [
            '#',
            'اسم العميل',
            'رقم العميل',
            'تاريخ التسجيل',
            'وقت الدخول'

            // Add more column headings as needed
        ];
    }
    public function map($row): array
    {
        $formattedDateTime = $row->created_at->format('Y-m-d H:i:s');

        $datePart = date('Y-m-d', strtotime($formattedDateTime)); // Extract date
        $timePart = date('H:i:s', strtotime($formattedDateTime)); // Extract time

        return [
            $row->index,
            $row->data_1,
            $row->data_2,
            $datePart, // Display the extracted date
            $timePart, // Display the extracted time
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Bold first row
            'D' => ['numFormat' => 'yyyy-mm-dd'], // Format date column
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 5,  // Width of column A (index column)
            'B' => 20, // Width of column B (data_1)
            'C' => 20, // Width of column C (data_2)
            'D' => 20, // Width of column D (created_at)
        ];
    }
}
