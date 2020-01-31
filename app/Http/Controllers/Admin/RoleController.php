<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Role;

class RoleController extends Controller
{
    
    public function CheckRole()
    {
        $users = User::all();
    	// $users = User::where('id', '>', 1)->get();
    	return view('project.user-role.index',[
    		'users' => $users,
    	]);
    }

    public function assignRole(Request $request)
    {
    	$user = User::where('email', $request['email'])->first();
    	// dd($user->toArray());
    	$user->roles()->detach();
    	if ($request['super_admin']) {
    		$user->roles()->attach(Role::where('name', 'super_admin')->first());
    	}
    	if ($request['admin']) {
    		$user->roles()->attach(Role::where('name', 'admin')->first());
    	}
    	if ($request['student']) {
    		$user->roles()->attach(Role::where('name', 'student')->first());
    	}
    	return redirect()->back()->with('roleassigned','Role Assigned Successfully to user!');
    }

}