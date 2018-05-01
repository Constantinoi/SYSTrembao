<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MesaStatus extends Model
{
    protected $table = "mesa_status";
    protected  $fillable = ['nome','descricao'];

    public function mesa(){
        return $this->hasOne(Mesa::class, 'mesa_status_id');
    }

    public static function statusAberto(){
        $statusMesaAberta = MesaStatus::where('nome','Livre')->first();
        return $statusMesaAberta->id;
    }

    public static function statusOcupado(){
        $statusMesaFechada = MesaStatus::where('nome','Ocupada')->first();
        return $statusMesaFechada->id;
    }

    public static function statusFinaliza(){
        $statusMesaFechada = MesaStatus::where('nome','Ocupada')->first();
        return $statusMesaFechada->id;
    }
}
