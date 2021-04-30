<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_participant';

    protected $fillable = [
    ];

    // retourner toutes les sociétés par participant
    public function societes(){
        $idSocietes = $this->societe_id;
        $societeok = explode(',', $idSocietes);
        $societes = array();
        foreach ($societeok as $idSociete){
            $soc = Societe::select('name')->where('id_societe', $idSociete)->first();
            array_push($societes, $soc['name']);
        }
        return $societes; //[{"name":"Soci\u00e9t\u00e9 1"}]
    }
}
