<?php 
namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository implements BaseRepository{
    public function __construct( protected Vehicle $model)
    {
        
    }
     /**
     * all  resource get
     * @return Collection
     */
    public function getAll(){
        return $this->model::with('TransportType')->paginate(10);
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
            $vehicle=$this->model::updateOrCreate(['id' => isset($request->id)? $request->id : ''],[
                'type_id' => $request->type_id,
                'name' => $request->name,
                'status' => $request->status,
            ]);

            if($vehicle){
                  $message= $request->id? "Vehicle Update Successfully" : "Vehicle Create Successfully";
                  return ['status'=>true , 'message' => $message];
            }
            return ['status'=>false , 'message' => "Something Wrong"];


        } catch (\Throwable $th) {
            //throw $th;
        }

    
     }
}