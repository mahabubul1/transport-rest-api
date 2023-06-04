<?php
namespace App\Repositories;

use App\Models\TransportType;
use App\Repositories\BaseRepository;

class TransportTypeRepository implements BaseRepository{


    public function __construct( protected TransportType $model)
    {
        
    }
     /**
     * all  resource get
     * @return Collection
     */
    public function getAll(){
        return $this->model::with('vehicles')->paginate(10);
    }
    
    /**
    *  specified resource get .
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
   */
    public function getById(int $id){
       return $this->model::findOrFail($id);
    } 

    /**
     * create
     * @param  mixed $request
     * @return Response
     */
    public function create($request){

        $result=$this->storeOrUpdate($request);
        return  $result;
    }

    /**
     * specified resource update
     *
     * @param int $id
     * @param mixed $request
     * @return Response
     *
     */
    public function update($request){

        $result=$this->storeOrUpdate($request);
        return  $result;
    }  
       
    /**
     * specified resource delete
     *
     * @param int $id
     * @return Response
     */
    public function delete($id){
        
    }


    /** store and update resorece
     * ======= storeOrUpdate =========
     *
     * @param int $id
     * @param  mixed $request
     * @return  response
     */

    protected function storeOrUpdate($request){

        try {
            $transportType=$this->model::updateOrCreate(['id' =>isset($request->id)? $request->id : ''],[
                'type' => $request->type,
                'status' => $request->status,
            ]);

            if($transportType){
                  $message= $request->id? "Type Update Successfully" : "Type Create Successfully";
                  return ['status'=>true , 'message' => $message];
            }
            return ['status'=>false , 'message' => "Something Wrong"];


        } catch (\Throwable $th) {
            //throw $th;
        }

    
     }



}