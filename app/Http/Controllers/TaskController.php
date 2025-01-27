<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'is_completed' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $task = Task::create([
            'title' => $request->input('title'),
            'is_completed' => $request->input('is_completed', false),
        ]);

        return response()->json($task, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $task = Task::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'is_completed' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $task->is_completed = $request->input('is_completed');
        $task->save();

        return response()->json($task, 200);
    }

    public function getPendingTasks(): JsonResponse
    {
        $tasks = Task::where('is_completed', false)->get();

        return response()->json($tasks, 200);
    }
}
