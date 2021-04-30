<?php

namespace App\Repositories;

use App\Models\Participant;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ParticipantRepository extends BaseRepository
{
    protected $participant;

    public function __construct()
    {
        $this->participant = new Participant();
    }

    // Tester si le mail existe déjà
    public function existeMail($email)
    {
        $test = $this->participant->where('email', $email)->get();
        return $test;
    }

    // Ajouter une siciete
    public function addParticipant($datas)
    {
    	$this->participant = new Participant();
        $this->participant->name = $datas['nom_participant'];
        $this->participant->societe_id = implode(",", $datas['societe']);
        $this->participant->email = $datas['email'];
        $this->participant->activated = 0;
        $this->participant->save();
    }

    // Changer statut participant après validation
    public function updateStatutParticipant($email)
    {
        $tst = true;
        $participant = $this->participant->where('email', $email)->first();
        $participant->activated = 1;
        $participant->update();
        return $tst;
    }

    // retourner toutes les participants
    public function getAllParticipant()
    {
    	return $this->participant->get();
    }

    // retourner un participant 
    public function getById($idParticipant)
    {
    	return $this->participant->where('id_participant', $idParticipant['idParticipant'])->first();
    }

    // Modifier participant
    public function editParticipantAjax($datas)
    {
    	$tst = true;
    	$participant = $this->participant->where('id_participant', $datas['idParticipant'])->first();
    	$participant->name = $datas['nomParticipant'];
    	// $participant->societe_id = $datas['societes'];
    	$participant->email = $datas['emailParticipant'];
    	$participant->update();
        return $tst;
    }

    // Tester l'existance d'une société dans participant
    public function testSocieteInParticipant($idSociete)
    {
    	$getAllParticipant = $this->getAllParticipant();
    	$idSociete = array();
    	foreach ($getAllParticipant as $participant) {
    		$idSociete[]= $participant->societe_id;
    	}
    	$test = implode(',', $idSociete);
    	return $test;
    }

    // Supprimer un participant
    public function deleteParticipant($idParticipant)
    {
        $this->participant=Participant::find($idParticipant);
        $this->participant->delete();
    }

    // Supprimer multiple des participants
    public function deleteMultipleParticipant($idParticipant)
    {
        $this->participant->whereIn('id_participant',$idParticipant)->delete();
    }
}