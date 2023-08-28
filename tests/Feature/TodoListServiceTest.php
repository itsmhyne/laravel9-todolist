<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\TodoListService;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoListServiceTest extends TestCase
{

    private TodoListService $todoListService;

    protected function setup():void
    {
        parent::setup();
        $this->todoListService = $this->app->make(TodoListService::class);
    }

    public function testTodoListNotNull()
    {
        self::assertNotNull($this->todoListService);
    }

    public function saveTodo()
    {
        $this->todoListService->saveTodo("1", "Todo Pertama");

        $todolist = Session::get("todolist");
        foreach ($todolist as $value) {
            self::assertEquals("1", $value['id']);
            self::assertEquals("Todo Pertama", $value['todo']);
        }
    }

    public function testGetTodoListEmpty()
    {
        self::assertEquals([], $this->todoListService->getTodoList());
    }

    public function testGetTodoListNotEmpty()
    {
        $expected = [
            [
            "id" => "1",
            "todo" => "Todo Pertama"
            ],
            [
            "id" => "2",
            "todo" => "Todo Kedua"
            ],
        ];

        $this->todoListService->saveTodo("1", "Todo Pertama");
        $this->todoListService->saveTodo("2", "Todo Kedua");

        self::assertEquals($expected, $this->todoListService->getTodoList());
    }

}
