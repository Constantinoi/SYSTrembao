<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MesaStatus; 
class Mesa extends Model
{
    protected $table = "mesas";
    protected  $fillable = ['numero','mesa_status_id'];

    public function pedido(){
        return $this->hasOne(Pedido::class,'mesa_id');
    }

    public function mesaStatus(){
        return $this->belongsTo(MesaStatus::class,'mesa_status_id');
    }

}
