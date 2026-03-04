<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['pending', 'in_progress', 'completed'];

        for ($i = 1; $i <= 25; $i++) {
            Task::create([
                'title' => 'Task ' . $i,
                'description' => 'This is the description for task ' . $i,
                'status' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}