<?php

use Illuminate\Database\Seeder;
use App\Models\UserDetails;

class UserDetailsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultUserDetails = new UserDetails();
        $defaultUserDetails->user_id = 0;
        $defaultUserDetails->address = "address";
        $defaultUserDetails->profile_image = "user.png";
        $defaultUserDetails->save();
    }
}
