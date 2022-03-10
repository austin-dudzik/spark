<?php

namespace Database\Seeders;

use App\Models\Label;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
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
            'content' => 'Welcome to Spark Notes!',
            'color' => '#a477d1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

    }
}
