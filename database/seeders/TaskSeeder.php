<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task([
            'title' => 'Laravel 101',
            'description' => 'Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum',
            'user_id' => 1,
            'label_id' => 1,
            'status' => 1,
        ]);
        $task->save();
    }
}
