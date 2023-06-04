<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;
use App\Models\TransportType;
use App\Repositories\TransportTypeRepository;


class TransportTypeController extends Controller
{


     public function __construct( protected TransportTypeRepository $type)
     {
        # code...
     }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

     
         $transportTypes= $this->type->getAll();
         return response()->json(['status' =>true , 'types'=>$transportTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        //
         $result= $this->type->create($request);

         if( $result['status'] == true){
            return response()->json(['status' =>true ,'message' =>$result['message']]);
         }
         return response()->json(['status' =>false ,'message' =>$result['message']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request)
    {
        //

        $result= $this->type->update($request);

        if( $result['status'] == true){
           return response()->json(['status' =>true ,'message' =>$result['message']]);
        }
        return response()->json(['status' =>false ,'message' =>$result['message']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
