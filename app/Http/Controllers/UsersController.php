<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\UsersExportTwo;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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

        return view('users.users', ['users' => User::all()]);
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

    /**
     * Export users to excel (Template 2)
     *
     * @return \Excel
     */
    public function delete($id){

        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users/')->with('success', 'User deleted');

    }


    /**
     * Add new user
     *
     * @return \Excel
     */
    public function add(){

        return view('users.add');

    }


    /**
     * Post new User
     *
     * @return \Excel
     */
    public function post(Request $request){


        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all(); 

        if(User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'city' => $data['city'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ])){

            return redirect('/users/')->with('success', 'User added');
        }

        return redirect()->back()->withInput();

    }
}
