<?php 

namespace App\Services\Impl;

use App\Services\TodoListService;
use Illuminate\Support\Facades\Session;

class TodoListServiceImpl implements TodoListService
{

    public function saveTodo(string $id, string $todo) : void 
    {
        if (!Session::exists("todolist")) {
            Session()->put('todolist', []);
        }

        Session()->push('todolist', [
            "id" => $id,
            "todo" => $todo
        ]);
    }

    public function getTodoList() : array {
        return Session::get("todolist", []);
    }
}


?>