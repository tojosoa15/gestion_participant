<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Repositories\SocieteRepository;
use App\Repositories\ParticipantRepository;

class PrincipaleController extends Controller
{
    public $societeRepository;
    public $participantRepository;
    
    public function __construct()
    {
        
        $this->societeRepository=new SocieteRepository();
        $this->participantRepository=new ParticipantRepository();

    }
    public function index()
    {
        return view('home');
    }
}
