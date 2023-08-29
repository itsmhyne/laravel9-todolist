<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Services\TodoListService;
use Illuminate\Http\Request;

class TodoListController extends Controller
{

    private TodoListService $todolistService;

    public function __construct(TodoListService $todolistService) {
        $this->todolistService = $todolistService;
    }
    
    public function todoList(Request $request)
    {
        $todolist = $this->todolistService->getTodolist();
        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist
        ]);
    }

    public function addTodo(Request $request)
    {
        $todo = $request->input("todo");

        if (empty($todo)) {
            $todolist = $this->todolistService->getTodolist();
            return response()->view("todolist.todolist", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo is required"
            ]);
        }

        $this->todolistService->saveTodo(uniqid(), $todo);

        return redirect()->action([TodoListController::class, 'todoList']);
    }

    public function removeTodo(Request $request, string $todoId): RedirectResponse
    {
        $this->todolistService->removeTodo($todoId);
        return redirect()->action([TodoListController::class, 'todoList']);
    }
}
