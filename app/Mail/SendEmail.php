<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $nome = $this->data["nome_contatoN"];
      $tel = $this->data["tel_contatoN"];
      $email = $this->data["email_contatoN"];
      $msg = $this->data["textAreaContatoN"];


      return $this->view('layouts.tests.send')
                  ->from($email, $nome)
                  ->cc($email, $nome)
                  ->bcc($email, $nome)
                  ->replyTo('frandosax@gmail.com', 'fran')
                  ->subject('Mensagem de contato');
    }
}
