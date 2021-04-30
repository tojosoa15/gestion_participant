<?php
namespace App\Http\Controllers\Societes;

// use App\Http\Controllers\PrincipaleController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
// use Validator;

class SocieteController extends Controller
{
    // Ajouter société
    public function addSociete(Request $request)
    {
        $datas = $request->all();
        $this->societeRepository->addSociete($datas);
        $message='Enregistrement effectué avec succès';
        return response()->json(['message'=>$message]);
    }

    //Ajax pour lister tous les societe
    public function listeSocieteAjax(Request $request)
    {
        if($request->ajax())
        {
            $societes = $this->societeRepository->getAllSociete();

            return Datatables::of($societes)
                ->addColumn('name', function($valeurs){
                    return $valeurs->name;
                })
                ->addColumn('action', function ($valeurs) {
                    return 
                        '<center>
                            <a href="#" onclick="showEditSociete('.$valeurs->id_societe.');"><button class="btn btn-primary" >Editer</button></a>
                            <a href="#" onclick="showDeleteSociete('.$valeurs->id_societe.');"><button class="btn btn-danger remove-societe">Supprimer</button></a>
                       </center>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Affichage modal pour modifier une société
    public function editSociete(Request $request)
    {
        $id_societe = $request->all();
        $societe = $this->societeRepository->getById($id_societe);

        return response()->json(['societe'=>$societe]);
    }

    // action de l'edition avec ajax
    public function editSocieteAjax(Request $request)
    {
        $datas = $request->all();
        $editSociete = $this->societeRepository->editSocieteAjax($datas);
        if($editSociete == true)
        {
            $message='Modification effectué avec succès';
        }
        return response()->json(['message'=>$message]);
    }

    // Supprimer une société
    public function deleteSociete(Request $request)
    {
        $idSociete = $request->input('idSociete');
        $test = $this->participantRepository->testSocieteInParticipant($idSociete);
        $response = explode(',', $test);

        if(in_array($idSociete, $response)){
            $message = "Cette société est reliée à un participant, vous ne pouvez pas la supprimer";
            $statut = 'red';
        }else{
            $this->societeRepository->deleteSociete($idSociete);
            $message = "Suppression effectué avec succès";
            $statut = 'green';
        }
        return response()->json(['message'=>$message, 'statut' => $statut]);
    }
}