<?php

namespace App\Http\Controllers;

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
        $todolist = $this->todolistService->getTodoList();
        
        return response()
        ->view("todolist.todolist", [
            "title" => "TodoList",
            "todolist" => $todolist
        ]);
    }

    public function addTodo(Request $request)
    {
        
    }

    public function removeTodo(Request $request, string $todoId)
    {
        
    }
}
