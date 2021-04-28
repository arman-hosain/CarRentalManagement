<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\car;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class CarController extends Controller
{
    //
    public function create(Request $request){

        if (Auth::user()->role==1){
            $brand=$request['brand'];
            $model=$request['model'];
            $milage=$request['milage'];
            $seat_number=$request['seat_number'];
            $location=$request['location'];
            $details=$request['details'];
            $rent=$request['rent'];

            $car=new car();
            if($request->hasfile('image')){
                $filenamewithExt=$request->file('image')->getClientOriginalName();
                $filename =pathinfo($filenamewithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                $path=$request->file('image')->storeAs('public/uploads',$fileNameToStore);
                $car->picture=$fileNameToStore;
            }
            else{
                     $car->picture="Null";
            }



    
        
            $car->brand=$brand;
            $car->model=$model;
            $car->milage=$milage;
            $car->seat_number=$seat_number;
            $car->location=$location;
            $car->details=$details;
            $car->rent=$rent;
            $car->status=0;
            
            
            
            $car->save();
    
            return redirect()->back();


        }
        else
        {
            return "unauthorized Access";
        }


        
    }

    // a method that shows new car

    // public function show(){
    //     $cars=car::all();

    //     return view('index',['cars'=>$cars]);

    // }
    

    
    public function edit($car_id){

        $car=Car::findOrFail($car_id);
        return view('edit',["car"=>$car]);

    }
    public function destroy($car_id){

      Car::destroy($car_id);
      return redirect()->route('cars.show');
  
    }


    public function statusUpdate($car_id){

        $car=Car::findOrFail($car_id);
      
        if ($car->status==1){
            $car->status=0;
        }
        else{
            $car->status=1;
        }
       
        $car->update();
      return redirect()->route('cars.show');
  
    }


    public function update(Request $request, $car_id){


        if (Auth::user()->role==1){

        }
        $car=Car::findOrFail($car_id);
        $car->brand=$request->input('brand');
        $car->model=$request->input('model');
        $car->milage=$request->input('milage');
        $car->seat_number=$request->input('seat_number');
        $car->rent=$request->input('rent');
        $car->location=$request->input('location');
        $car->details=$request->input('details');
        $car->update();

        // return redirect()->back();

        return redirect()->route('cars.show');
     
    }

        
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        // dd($search);
           //     $cars=car::all();

    //     return view('index',['cars'=>$cars]);
    
        // Search in the title and body columns from the posts table
        if($search==null){
            $cars=car::all();

            return view('index',['cars'=>$cars]);
            
        }
        $cars=car::query()
            ->where('brand', 'LIKE', "%{$search}%")
            ->orWhere('model', 'LIKE', "%{$search}%")
            ->orWhere('seat_number', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('index',['cars'=>$cars]);
    }
}
