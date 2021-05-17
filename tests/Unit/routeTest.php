<?php

namespace Tests\Unit;

use Tests\TestCase;

class routeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_registerRoute()
    {
        $response=$this->get('/register');
        $response->assertStatus(200);
    }

    public function test_home_route(){

        $response=$this->get('/home');
        $response->assertStatus(302);
    }

    public function test_login_route(){

        $response=$this->get('/login');
        $response->assertStatus(200);
    }

    public function test_addCar_route(){
        $response=$this->get('/addCarx');
        $response->assertStatus(302);
    }

    
}
