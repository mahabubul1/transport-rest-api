<?php

namespace App\Models;

use App\Models\TransportType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded =  ['id'];


     public function TransportType()
     {
         return $this->belongsTo(TransportType::class, 'type_id', 'id');
     }
}
