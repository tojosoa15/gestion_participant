<?php

namespace App\Repositories;

use App\Models\Societe;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class SocieteRepository extends BaseRepository
{
    protected $societe;

    public function __construct()
    {
        $this->societe = new Societe();
    }

    // Ajouter une siciete
    public function addSociete($datas)
    {
    	$this->societe = new Societe();
        $this->societe->name = $datas['nom'];
        $this->societe->save();
    }

    // retourner toutes les sociétés
    public function getAllSociete()
    {
    	return $this->societe->get();
    }

    // retourner une société 
    public function getById($idSociete)
    {
    	return $this->societe->where('id_societe', $idSociete['idSociete'])->first();
    }

    // Modifier société
    public function editSocieteAjax($datas)
    {
    	$tst = true;
    	$societe = $this->societe->where('id_societe', $datas['idSociete'])->first();
    	$societe->name = $datas['nomSociete'];
    	$societe->update();
        return $tst;
    }

    // Supprimer une société
    public function deleteSociete($idSociete)
    {
        $this->societe=Societe::find($idSociete);
        $this->societe->delete();
    }
}