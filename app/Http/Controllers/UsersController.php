<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\UsersExportTwo;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users', ['users' => User::all()]);
    }


    /**
     * Export users to excel
     *
     * @return \Excel
     */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }


    /**
     * Export users to excel (Template 2)
     *
     * @return \Excel
     */
    public function exportTwo() 
    {
        return Excel::download(new UsersExportTwo, 'users.xlsx');
    }
}
