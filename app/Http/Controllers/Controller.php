<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Repositories\SocieteRepository;
use App\Repositories\ParticipantRepository;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $societeRepository;
    public $participantRepository;

    public function __construct()
    {
        
        $this->societeRepository=new SocieteRepository();
        $this->participantRepository=new ParticipantRepository();

    }
    public function index()
    {
        $societes = $this->societeRepository->getAllSociete();
        return view('home')->with(compact('societes'));
    }
}
