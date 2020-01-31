<?php

use Illuminate\Database\Seeder;

use App\User;

use App\Models\Role;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super_admin = Role::where('name', 'super_admin')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'student')->first();
        
        $super_admin = new User();
        $super_admin->name = "Super Admin User";
        $super_admin->email = "superadmin@pnyexam.com";
        $super_admin->password = Hash::make('examadmin123');
        $super_admin->user_role = 'super_admin';
        $super_admin->save();
        $SA_U_D = new UserDetails();
        $SA_U_D->user_id = $super_admin->id;
        $SA_U_D->save();
        $super_admin->roles()->attach($role_super_admin);

        $admin = new User();
        $admin->name = "Admin User";
        $admin->email = "admin@pnyexam.com";
        $admin->password = Hash::make('423kj24l3kj2lkj4');
        $admin->user_role = 'admin';
        $admin->save();
        $A_U_D = new UserDetails();
        $A_U_D->user_id = $admin->id;
        $A_U_D->save();
        $admin->roles()->attach($role_admin);

        $role_user = new User();
        $role_user->name = "student";
        $role_user->email = "student@pnyexam.com";
        $role_user->password = Hash::make('123456');
        $role_user->password_remember = '123456';
        $role_user->course_name = 'web';
        $role_user->batch = '1';
        $role_user->user_role = 'student';
        $role_user->save();
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $role_user->id;
        $B_U_D->save();
        $role_user->roles()->attach($role_user);
    }
}
