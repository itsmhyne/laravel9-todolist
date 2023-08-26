<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp():void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("itsmhyne", "password"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("hamdan", "hamdan"));
    }

    public function testLoginWrongPassword()
    {
        self::assertFalse($this->userService->login("itsmhyne", "hamdan"));
    }
}
