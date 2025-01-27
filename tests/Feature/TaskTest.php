<?php

namespace Tests\Feature;

use App\Models\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /** @test */
    public function it_can_create_a_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Finish Laravel test',
            'is_completed' => false,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'title' => 'Finish Laravel test',
            'is_completed' => false,
        ]);
    }

    /** @test */
    public function it_can_mark_a_task_as_completed()
    {
        $task = Task::create(['title' => 'Finish Laravel test']);

        $response = $this->patchJson('/api/tasks/' . $task->id, [
            'is_completed' => true,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $task->id,
            'title' => 'Finish Laravel test',
            'is_completed' => true,
        ]);
    }

    /** @test */
    public function it_can_get_pending_tasks()
    {
        Task::create(['title' => 'Finish Laravel test', 'is_completed' => false]);

        $response = $this->getJson('/api/tasks/pending');

        $response->assertStatus(200);
        $response->assertJson([
            ['title' => 'Finish Laravel test', 'is_completed' => false],
        ]);
    }
}
