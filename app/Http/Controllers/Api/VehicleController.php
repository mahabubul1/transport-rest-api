<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Repositories\VehicleRepository;

class VehicleController extends Controller
{
    //

    public function __construct( protected VehicleRepository $vehicle)
    {
       # code...
    }
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
        $vehicles= $this->vehicle->getAll();
        return response()->json(['status' =>true , 'vehicles'=>$vehicles]);
   }

     /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        //
    
  
         $result= $this->vehicle->create($request);

         if( $result['status'] == true){
            return response()->json(['status' =>true ,'message' =>$result['message']]);
         }
         return response()->json(['status' =>false ,'message' =>$result['message']]);
    }


     /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request)
    {
        //

        $result= $this->vehicle->update($request);

        if( $result['status'] == true){
           return response()->json(['status' =>true ,'message' =>$result['message']]);
        }
        return response()->json(['status' =>false ,'message' =>$result['message']]);
    }
}
