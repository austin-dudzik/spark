<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Run the seeders
        (new UserSeeder())->run();
        (new LabelSeeder())->run();
        (new TaskSeeder())->run();
        (new NoteSeeder())->run();
    }
}
