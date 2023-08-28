<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use App\Services\CreateTaskService;
use App\Services\TaskAuthorizationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller {
    

    public function createTask(CreateTaskRequest $request){
        $user = Auth::user();
        $request->merge(['user_id' => $user->id]);
        $createTaskService = new CreateTaskService();
        return $createTaskService->execute($request->all());
    }

    public function listTasks(){
        return Task::with('userTask')->get();
    }

    public function retrieveTask($id){
        $task = Task::with('userTask')->findOrFail($id);
        return $task;
    }

    public function updateTask(Request $request, $id)
    {
        $taskAuthorizationService = app(TaskAuthorizationService::class);

        $task = Task::findOrFail($id);
        $taskAuthorizationService->checkAuthorization($task);

        $task->update($request->all());

        return $task;
    }

    public function deleteTask($id)
    {
        $taskAuthorizationService = app(TaskAuthorizationService::class);

        $task = Task::findOrFail($id);
        $taskAuthorizationService->checkAuthorization($task);

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully!']);
    }
}