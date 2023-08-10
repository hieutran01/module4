<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
  public function test_route_user(){

    $this->get('/user')->assertStatus(302);
    $this->get('/user/create')->assertStatus(302);
  }
}
