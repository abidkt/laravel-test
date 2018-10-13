<?php

namespace App\Exports;


use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{

	use Exportable;

    public function query()
    {
        return User::query()->select('id', 'username', 'email');
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
            'User ID',
            'Username',
            'Email'
        ];
    }
}
