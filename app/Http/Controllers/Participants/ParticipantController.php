<?php
namespace App\Http\Controllers\Participants;

// use App\Http\Controllers\PrincipaleController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendEmailToParticipant;
use Illuminate\Support\Facades\Mail;

// use Validator;

class ParticipantController extends Controller
{
    // Ajouter participant
    public function addParticipant(Request $request)
    {
        $datas = $request->all();
        $nom = $datas['nom_participant'];
        $email = $datas['email'];
        $unicite_mail = $this->participantRepository->existeMail($email);
        if(count($unicite_mail)>0){
            $message='Cette adresse email existe déjà, veuillez essayer une autre';
            $statut = 'red';
        }
        else{
            
            $this->participantRepository->addParticipant($datas);

            try {
                Mail::to($email)->send(new SendEmailToParticipant($nom,$email));
            }
            catch(\Exception $exception){
                $message="Erreur d'envoie mail";
                $statut = 'red';
            }

            $message = 'Enregistrement effectué avec succès, veuillez consulter votre mail pour valider votre email et activer votre compte';
            $statut = 'green';
            
        }

        return response()->json(['message'=>$message, 'statut' => $statut]);
        
    }

    // validation compte via mail
    public function validation($email){
        $this->participantRepository->updateStatutParticipant($email);
        $societes = $this->societeRepository->getAllSociete();
        return view('home')->with(compact('societes'));
    }

    //Ajax pour lister tous les participants
    public function listeParticipantAjax(Request $request)
    {
        if($request->ajax())
        {
            $participants = $this->participantRepository->getAllParticipant();

            return Datatables::of($participants)
                ->addColumn('check',function($valeurs){
                   return  '<center><input type="checkbox" value="'.$valeurs->id_participant.'" name="checkboxs[]" id="val-check"></center>';
                })
                ->addColumn('name', function($valeurs){
                    return $valeurs->name;
                })
                ->addColumn('societe', function($valeurs){
                    return $valeurs->societes();
                })
                ->addColumn('email', function($valeurs){
                    return $valeurs->email;
                })
                ->addColumn('statut', function($valeurs){
                    if($valeurs->activated == 0){
                        return '<center><button class="btn btn-warning" >Inactif</button></center>';
                    }else{
                        return '<center><button class="btn btn-success" >Actif</button></center>';
                    }
                    
                })
                ->addColumn('action', function ($valeurs) {
                    return 
                        '<center>
                            <a href="#" onclick="showEditSParticipant('.$valeurs->id_participant.');"><button class="btn btn-primary" >Editer</button></a>
                            <a href="#" onclick="showDeleteParticipant('.$valeurs->id_participant.');"><button class="btn btn-danger remove-societe">Supprimer</button></a>
                       </center>';
                })
                ->rawColumns(['check','statut','action'])
                ->make(true);
        }
    }

    // Affichage modal pour modifier un participant
    public function editParticipant(Request $request)
    {
        $id_participant = $request->all();
        $participant = $this->participantRepository->getById($id_participant);

        return response()->json(['participant'=>$participant]);
    }

    // action de l'edition avec ajax
    public function editParticipantAjax(Request $request)
    {
        $datas = $request->all();
        $editParticipant = $this->participantRepository->editParticipantAjax($datas);
        if($editParticipant == true)
        {
            $message='Modification effectué avec succès';
        }
        return response()->json(['message'=>$message]);
    }

    // Supprimer un participant
    public function deleteParticipant(Request $request)
    {
        $idParticipant = $request->input('idParticipant');
        $this->participantRepository->deleteParticipant($idParticipant);
        $message = "Suppression effectué avec succès";
        return response()->json(['message'=>$message]);
    }

    // Supprimer multiple des participants
    public function deleteMultipleParticipant(Request $request)
    {
        $id_participant = $request->input('arrayOfValues');
        $this->participantRepository->deleteMultipleParticipant($id_participant);
        $message = "Suppression multiple effectué avec succès";
        return response()->json(['message'=>$message]);
    }
}