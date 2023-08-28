<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function test_loginPage()
    {
        $this->get('/login')
        ->assertSeeText("Login");
    }
    
    public function testLoginPageForMember()
    {
        $this->withSession([
            "user" => "admin"
        ])->get('/login')
            ->assertRedirect('/');
    }
    
    public function testLoginPageForUserAlreadyLogin()
    {
        $this->withSession([
            "user" => "admin"
        ])->post('/login', [
            "user" => "admin",
            "password" => "password"
        ])->assertRedirect('/');
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "admin",
            "password" => "password"
        ])->assertRedirect("/")
            ->assertSessionHas("user", "admin");
    }

    public function testLoginValidationError()
    {
        $this->post('/login', [])
            ->assertSeeText("User or Password is Required!");
    }

    public function testLoginFailed()
    {
        $this->post('/login', [
            "user" => "admin cuy",
            "password" => "password"
        ])->assertSeeText("User or Password is Wrong!");
    }

    public function testLogout()
    {
        $this->withSession([
            "user" => "admin"
        ])->post('/logout')
            ->assertRedirect('/')
            ->assertSessionMissing("user");
    }
}
