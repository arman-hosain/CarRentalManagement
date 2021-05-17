<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Http\controllers\CarController;
use Illuminate\Http\Request;

use Session;
use App\User;
use Auth;
class carTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_create_new_car(){
        Session::start();
        $user = User::find(6);
        Auth::login($user);

        $data=['brand'=>'ROLS','model'=>'X52','milage'=>'69' ,'seat_number'=>'5','location'=>'DHAKA','details'=>'test1236','rent'=>'52000','status'=>'0','picture'=>"Null"];
        $response=$this->json('POST', '/create',$data);


        $this->assertDatabaseHas('cars', [
            'brand'=>'ROLS'
        ]);

    }

    public function test_delete_car(){

        $carcon = new CarController;
    
        $car_id=30;
        $response = $carcon->destroy( $car_id);

        
        // dd($response->getContent());
        $this->assertDatabaseMissing('cars', [
            'id'=>'30'
        ]);

    }


    public function testCarSearch()
    {   

        $result=$this->search("lambo");
        $expected="Lamborghini";

        $this->assertEquals($result, $expected,"actual value is not equals to expected");

    
    }

    
    
    

    protected function search($name){

        $carcon = new CarController;
        $request = new Request;
        $request->replace(['search' => $name]);
        $response = $carcon->search($request)['cars'];

       return  $response[0]->brand;


    }
}

