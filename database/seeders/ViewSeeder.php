<?php

namespace Database\Seeders;

use App\Models\View;
use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $view = new View([
            'user_id' => 1,
            'sort_by' => 'due_date',
            'order_by' => 'asc',
            'task_view' => 'list',
        ]);
        $view->save();

    }
}
