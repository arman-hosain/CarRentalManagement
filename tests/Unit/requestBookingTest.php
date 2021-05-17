<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Http\controllers\RequestController;
use Illuminate\Http\Request;

use Session;
use App\User;
use Auth;

class requestBookingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_request_book_by_user()
    {
        $this->login(7);
        $carcon = new RequestController;
    
        $car_id=31;
        $request = new Request;
        $request->replace([
        'message'=>'test123',
        'request_date'=>'2021-05-08']);
        $response = $carcon->requestBook($car_id,$request);




        $this->assertDatabaseHas('request_bookings', [
            'car_id'=>'31'
        ]);
    }



    protected function login($id){
        Session::start();
        $user = User::find($id);
        Auth::login($user);
    }



}
