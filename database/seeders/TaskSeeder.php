<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $today     = now()->toDateString();
        $yesterday = now()->subDay()->toDateString();
        $tomorrow  = now()->addDay()->toDateString();
        $nextWeek  = now()->addWeek()->toDateString();

        $tasks = [
            ['Submit lab activity',     'pending', $today],
            ['Review Laravel routing',  'pending', $today],
            ['Group meeting',           'done',    $today],
            ['Read module handout',     'done',    $yesterday],
            ['Back up project files',   'done',    $yesterday],
            ['Prepare presentation',    'pending', $tomorrow],
            ['Practice Packet Tracer',  'pending', $tomorrow],
            ['Study for quiz',          'pending', $nextWeek],
        ];

        foreach ($tasks as [$title, $status, $date]) {
            Task::create([
                'title'     => $title,
                'status'    => $status,
                'task_date' => $date,
            ]);
        }
    }
}