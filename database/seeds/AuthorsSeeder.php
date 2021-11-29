<?php

use Illuminate\Database\Seeder;
use App\Authors;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Authors::class, 1000)->create();
    }
}
