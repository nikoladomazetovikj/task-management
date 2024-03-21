<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\EditTaskRequest;
use App\Models\Task;
use Inertia\Inertia;

class TaskPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Task/CreateTask');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task, EditTaskRequest $request): \Inertia\Response
    {
        return Inertia::render('Task/EditTask', ['task' => $task]);
    }
}
