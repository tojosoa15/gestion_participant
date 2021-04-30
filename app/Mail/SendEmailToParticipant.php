<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

//envoie email à l'utilisateur
class SendEmailToParticipant extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user object instance.
     *
     * @var User
     */
    public $nom; //client
    public $email;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom,$email)
    {
        $this->nom = $nom;
        $this->email = $email;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('raharisontojosoa@gmail.com')
            ->subject('Email de confirmation')
            ->view('form_mail');
    }
}