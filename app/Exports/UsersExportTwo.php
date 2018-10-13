<?php

namespace App\Exports;


use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExportTwo implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{

	use Exportable;

    public function query()
    {
        return User::query()->select('first_name', 'last_name', 'city');
    }


    /**
     * @return string
     */
    public function title(): string
    {
        return 'Users';
    }


    /**
     * Column Headings
     * @return array
     */
    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'City'
        ];
    }
}
