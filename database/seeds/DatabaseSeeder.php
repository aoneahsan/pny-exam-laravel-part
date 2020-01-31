<?php

use Illuminate\Database\Seeder;

use App\Models\Quiz;
use App\Models\Question;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeed::class);
        $this->call(UserDetailsTableSeed::class);
        $this->call(UserTableSeed::class);
        factory(Quiz::class, 5)->create();
        factory(Question::class, 30)->create();
    }
}
