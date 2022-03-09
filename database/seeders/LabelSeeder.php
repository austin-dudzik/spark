<?php

namespace Database\Seeders;

use App\Models\Label;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $task = new Label([
            'user_id' => 1,
            'name' => 'Work',
            'color' => '#299438',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

        $task = new Label([
            'user_id' => 1,
            'name' => 'School',
            'color' => '#db4035',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

        $task = new Label([
            'user_id' => 1,
            'name' => 'Family',
            'color' => '#fad000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

    }
}
