<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRegister(){
        $data=['name'=>'Arman','email'=>'arman@gmail.com','password'=>'tormuj69' ,'password_confirmation'=>'tormuj69','role'=>'0','NID'=>'123456789','age'=>'20'];
        $response=$this->json('POST', '/register',$data);
        // dd($response->getContent());
       
        $this->assertDatabaseHas('users', [
            'email'=>'arman@gmail.com'
        ]);
    }



    public function testDashboard(){
        $response=$this->get("/dashboard");
        $response->assertStatus(302);
    }


    public function testHasAdmin(){
        $this->assertDatabaseHas('users', [
            'role'=>'1'
        ]);
    }







}
