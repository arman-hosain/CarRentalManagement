<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Http\controllers\CarBookingController;
use App\carBooking;
use Illuminate\Http\Request;

use Session;
use App\User;
use Auth;

class carBookingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_booking_car()
    {
        $this->login(6);
        $carcon = new carBookingController;
    
        $car_id=31;
        $request = new Request;
        $request->replace([
        'rent'=>'2021-05-08']);
        $response = $carcon->booking($request,$car_id);


        $this->assertDatabaseHas('car_bookings', [
            'car_id'=>'31'
        ]);
    }


    public function test_booking_form_view(){

        
            $response=$this->get("/carBooking/27");
            $response->assertStatus(302);
      
    
    }




    protected function login($id){
        Session::start();
        $user = User::find($id);
        Auth::login($user);
     }
}

