<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
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
            'user_id' => 1,
            'title' => 'My first task',
            'description' => 'Welcome to Spark! This is your first task. Feel free to edit it, delete it, or click the "Add Task" button to add more tasks.',
            'label_id' => null,
            'completed' => null,
            'due_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

        $task = new Task([
            'user_id' => 1,
            'title' => 'Complete Biology 101 worksheet',
            'description' => 'Read pages 101-145 of the Biology textbook and complete the worksheet.',
            'label_id' => 2,
            'completed' => null,
            'due_date' => Carbon::now()->addDays(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

        $task = new Task([
            'user_id' => 1,
            'title' => 'Submit final analysis report',
            'description' => '',
            'label_id' => 1,
            'completed' => null,
            'due_date' => Carbon::now()->addDays(14),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

        $task = new Task([
            'user_id' => 1,
            'title' => 'Take the kids to the park',
            'description' => 'Bring the kids to the park on the weekend',
            'label_id' => 3,
            'completed' => null,
            'due_date' => Carbon::now()->addHours(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

        $task = new Task([
            'user_id' => 1,
            'title' => 'Cut the grass this week',
            'description' => '',
            'label_id' => 3,
            'completed' => null,
            'due_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();

    }
}
