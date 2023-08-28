<?php 

namespace App\Services\Impl;

use App\Services\TodoListService;
use Illuminate\Support\Facades\Session;

class TodoListServiceImpl implements TodoListService
{

    function saveTodo(string $id, string $todo) : void 
    {
        if (!Session::exists("todolist")) {
            $request->session()->put('todolist', []);
        }

        Session()->push('todolist', [
            "id" => $id,
            "todo" => $todo
        ]);
    }
}


?>