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
            ->assertSeeText("Todo Pertama")
            ->assertSeeText("2")
            ->assertSeeText("Todo Kedua");
    }

    public function addTodoFailed()
    {
        $this->withSession([
            "user" => "admin",
        ])->post('/todolist', [])
            ->assertSeeText("Todo is Required!");
    }

    public function addTodoSuccess()
    {
        $this->withSession([
            "user" => "admin",
        ])->post('/todolist', [
            "todo" => "Todo Pertama"
        ])->assertRedirect("/todolist");
    }

    public function testRemoveTodolist()
    {
        $this->withSession([
            "user" => "khannedy",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Eko"
                ],
                [
                    "id" => "2",
                    "todo" => "Kurniawan"
                ]
            ]
        ])->post("/todolist/1/delete")
            ->assertRedirect("/todolist");
    }
}
