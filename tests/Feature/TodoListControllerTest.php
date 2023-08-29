<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession([
            "user" => "admin",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Todo Pertama"
                ],
                [
                    "id" => "2",
                    "todo" => "Todo Kedua"
                ],
            ]
        ])->get("/todolist")
            ->assertSeeText("1")
            ->assertSeeText("Todo Pertama");
            ->assertSeeText("2")
            ->assertSeeText("Todo Kedua");
    }
}
