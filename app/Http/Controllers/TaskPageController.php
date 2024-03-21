<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
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
    public function edit(Task $task): \Inertia\Response
    {
        return Inertia::render('Task/EditTask', ['task' => $task]);
    }

}
