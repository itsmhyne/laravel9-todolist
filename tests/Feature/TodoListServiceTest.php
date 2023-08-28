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

}
