<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Complete Documentation',
            'is_completed' => true,
        ]);

        Task::create([
            'title' => 'Finish Laravel Test',
            'is_completed' => false,
        ]);
    }
}
