<?php 

namespace App\Services\Impl;

use App\Services\TodoListService;

class TodoListServiceImpl implements TodoListService
{

    private array $users = [
        "itsmhyne" => "password",
        "admin" => "password",
    ];

    function login(string $user, string $password) : bool 
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        return $password == $correctPassword;
    }
}


?>