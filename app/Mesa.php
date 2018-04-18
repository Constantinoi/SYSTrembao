<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = "mesas";
    protected  $fillable = ['numero','status'];


    public function pedido(){
        return $this->hasOne(Pedido::class);
    }
}
