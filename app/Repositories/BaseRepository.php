<?php 
namespace App\Repositories;

interface BaseRepository {
        
    /**
     * all  resource get
     * @return Collection
     */
    public function getAll();
    
    /**
    *  specified resource get .
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
   */
    public function getById(int $id); 

    /**
     * create
     * @param  mixed $request
     * @return Response
     */
    public function create($request); 

    /**
     * specified resource update
     *
     * @param int $id
     * @param mixed $request
     * @return Response
     *
     */
    public function update($request);  
       
    /**
     * specified resource delete
     *
     * @param int $id
     * @return Response
     */
    public function delete($id);
    
}