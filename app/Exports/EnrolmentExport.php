<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EnrolmentExport implements FromCollection, WithHeadings, WithMapping
{
    public Collection $enrolls;

    public function __construct($enrolls)
    {
        $this->enrolls = $enrolls;
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return $this->enrolls;
    }

    public function map($row): array
    {

        return [
            $row->order_number,
            $row->user ? $row->user->username : '-',
            $row->first_name ?: '-',
            $row->email,
            !empty($row->course) ? $row->course->title : '-',
            $row->payment_method,
            $row->payment_status,
            $row->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'Order Number', 'Username', 'Name', 'Email', 'Course', 'Price', 'Gateway', 'Payment Status', 'Date'
        ];
    }
}
