<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superAdmin = new Role();
        $role_superAdmin->name = "super_admin";
        $role_superAdmin->description = "Super Admin User";
        $role_superAdmin->save();

        $role_admin = new Role();
        $role_admin->name = "admin";
        $role_admin->description = "Admin User";
        $role_admin->save();

        $role_rider = new Role();
        $role_rider->name = "student";
        $role_rider->description = "student User";
        $role_rider->save();
    }
}
