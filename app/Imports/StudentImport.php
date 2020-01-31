<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\UserDetails;
use App\Models\Role;

class StudentImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
      $users_emails = User::pluck('email')->toArray();
      // dd($users_emails);
      foreach ($rows as $row) 
      {
        if (!in_array($row[1], $users_emails)) {
          $user = User::create([
            'name'     => $row[0],
            'email'    => $row[1],
            'password' => Hash::make($row[2]),
            'password_remember' => $row[2],
            'course_name' => $row[3],
            'batch' => $row[4],
            'user_role' => 'student'
          ]);
          $user->roles()->attach(Role::where('name', 'student')->first());
          // DB::table('user_role')->insertGetId([
          //   'user_id' => $user->id,
          //   'role_id' => 3,
          // ]);
          // dd($user, $user->id, $result);
          UserDetails::create([
              'user_id' => $user->id,
              'profile_image' => 'user.png'
          ]);
        }
      }
    }
}
