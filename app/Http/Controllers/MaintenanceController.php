<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \App\Models\User;


use \App\Rules\UserContact;
class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $this->middleware('auth');
        $users = DB::table('users')
            ->join('roles', 'roles.role_id', '=', 'users.role_id')
            ->select(DB::raw("CONCAT(users.first_name,' ',users.middle_name,' ',users.last_name) as name"), 'users.role_id as role_id', 'roles.name as role', 'users.user_id as user_id')
            ->whereNull('users.deleted_at')
            ->orderBy('users.user_id', 'ASC')
            ->get();
            //dd($stocks);
        $roles = DB::table('roles')
            ->get();
        return view('maintenance.index', compact('users', 'roles'));
    }

    public function role_edit($user_id)
    {
        $this->middleware('auth');
        $users = DB::table('users')
            ->where('users.user_id', $user_id)
            ->first();
            //dd($stocks);
        $roles = DB::table('roles')
            ->where('roles.role_id', '!=', '3')
            ->get();
        return view('maintenance.edit', compact('users', 'roles'));
        
    }

    public function role_update($user_id)
    {

        $data = request()->validate([
            'first_name' => ['required', 'string', 'max:255', 'min:2'],
            'middle_name' => ['required', 'string', 'max:255', 'min:2'],
            'last_name' => ['required', 'string', 'max:255', 'min:2'],
            'birth_date' =>['required', 'date'],
            'address' => ['required', 'string'],
            'contact_number' => ['required', 'string', 'size:13', 'starts_with:+63', new UserContact($user_id)],
            'role' => ['required']
        ]);

        $user_data = [
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'contact_number' => $data['contact_number'],
            'role_id' => $data['role']
        ];
        if (User::where('user_id', $user_id)->update($user_data))
        {
            return redirect()->route('maintenance.index');
        }
        else
            abort(404);
    }
}
