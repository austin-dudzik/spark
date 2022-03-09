<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new User([
            'name' => 'Johnny Spark',
            'email' => 'johnny.spark@example.org',
            'email_verified_at' => null,
            'password' => bcrypt('love2code'),
            'remember_token' => null,
            'theme' => '#ff822d',
            'daily_goal' => 5,
            'weekly_goal' => 20,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();
    }
}
