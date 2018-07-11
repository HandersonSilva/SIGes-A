<?php

namespace App\Listeners;

use App\Events\EventEmail;
use App\UserContato;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use SendGrid\Email;

class ListenerEnvioEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventEmail  $event
     * @return void
     */
    public function handle(EventEmail $event)

    {
        //minha logica

        //pega a variavel request que é passada para o EventEmail
         $request = $event->request;
        //envio para os adm do SIGA_RN
        /* Mail::send('layouts.tests.email_siga',$request->all(), function($msg){
             $msg->subject('Novo contato');
             $msg->to('handersonsylva@gmail.com');
             $msg->cc('frandosax@gmail.com');
 
             /*EXAMPLO::
             Here is a list of the available methods on the $message message builder instance:
             $message->from($address, $name = null);
             $message->sender($address, $name = null);
             $message->to($address, $name = null);
             $message->cc($address, $name = null);
             $message->bcc($address, $name = null);
             $message->replyTo($address, $name = null);
             $message->subject($subject);
             $message->priority($level);
             $message->attach($pathToFile, array $options = []);
 
             // Attach a file from a raw $data string...
             $message->attachData($data, $name, array $options = []);
 
             // Get the underlying SwiftMailer message instance...
             $message->getSwiftMessage();
           });*/
 
 
           /* This example is used for sendgrid-php V2.1.1 (https://github.com/sendgrid/sendgrid-php/tree/v2.1.1)
                         https://docs.microsoft.com/pt-br/azure/store-sendgrid-php-how-to-send-email
                 */
                  
                 //get dados
                 $nome = $request->nome_contatoN;
                 $telefone = $request->tel_contatoN;
                 
                 $assunto = "Contato SIGes-A";
                 $emailDe = "contato@sigesa.com";//Email da empresa o qual vai retornar o contato automatico para o cliente
                 $msgUsuario = isset($_POST['textAreaContatoN'])?$_POST['textAreaContatoN']:" ";
                 $emailUser = isset($_POST['email_contatoN'])?$_POST['email_contatoN']:" ";
                
                
                 
               
                 $email = new Email();
                 // The list of addresses this message will be sent to
                 // [This list is used for sending multiple emails using just ONE request to SendGrid]
                 $toList = array('handersonsylva@gmail.com','frandosax@gmail.com','jhsbgs@gmail.com');//lista de usuario para enviar email


        // Specify the names of the recipients
                 $nameList = array($nome,$nome);
             
                 // Used as an example of variable substitution
                 $telList = array($telefone,$telefone);
                 $emailList =array($emailUser,$emailUser);
                 $msglList = array($msgUsuario,$msgUsuario);
 
             
                 // Set all of the above variables
                  $email->setTos($toList);
                  $email->addSubstitution('-name-', $nameList);
                  $email->addSubstitution('-telefone-', $telList);
                  $email->addSubstitution('-email-', $emailList);
                  $email->addSubstitution('-mensage-', $msglList);
             
                 // Specify that this is an initial contact message
                 $email->addCategory("initial");
             
                 // You can optionally setup individual filters here, in this example, we have
                 // enabled the footer filter

             
                 // The subject of your email
                 $subject = $assunto;
             
                 // Where is this message coming from. For example, this message can be from
                 // support@yourcompany.com, info@yourcompany.com
                 $from = $emailDe;
             

 
                 //layout do email
                 $html = "
        <!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <title>Mensagem de contato SIGes-A</title>
</head>
<body>

  <table align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" data-mobile=\"true\" dir=\"ltr\" data-width=\"600\" style=\"font-size: 16px; background-color: rgb(255, 255, 255);\">
  <tbody>
    <tr>
      <td align=\"center\" valign=\"top\" style=\"margin:0;padding:0;\">
          <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#51beaa\" width=\"600\" class=\"wrapper\" style=\"width: 600px;\">
              <tbody><tr>
                  <td align=\"center\" valign=\"top\" bgcolor=\"#ffffff\" style=\"margin:0;padding:0;\">

                  </td>
              </tr>
              <tr>
                  <td valign=\"top\" align=\"center\" style=\"padding:0;margin:0;\">
                      <table align=\"center\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-editable=\"text\" class=\"text-block\">
                          <tbody><tr>
                              <td valign=\"top\" align=\"center\" class=\"lh-1\" style=\"padding: 53px 0px 18px; margin: 0px; line-height: 1.15; font-size: 16px; font-family: 'Times New Roman', Times, serif;\">
                                    <span style=\"font-family:Verdana,Arial,sans-serif;font-size:30px;font-weight:400;color:#ffffff; line-height:1.1;\">
                                            <img  width=\"250px\" height=\"190px\" src=\"http://jhsdev.com/img/logo/logo_footer.png\"/> </span></td>
                          </tr>
                      </tbody></table>
                  </td>
              </tr>
             
              <tr>
                  <td valign=\"top\" align=\"center\" style=\"padding:0;margin:0;\">
                      <table align=\"center\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-editable=\"text\" class=\"text-block\">
                          <tbody>
                            <tr>
                              <td valign=\"top\" align=\"center\" class=\"lh-3\" style=\"padding: 30px 60px 21px; margin: 0px; line-height: 1.35; font-size: 16px; font-family: 'Times New Roman', Times, serif;\">
                                  <span style=\"font-family:Verdana,Arial,sans-serif;font-size:16px;font-weight:400;color:#fffefe; line-height:1.3;\">
                                  -name- requer sua atenção, retorne o mais rápido possìvel.</span>
                                </td>
                          </tr>
                      </tbody></table>
                  </td>
              </tr>
              <tr>
                  <td align=\"center\" valign=\"top\" style=\"margin:0;padding:0;\">
                      <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" data-editable=\"image\" data-mobile-stretch=\"0\" width=\"7%\">
                          <tbody><tr>
                              <td valign=\"top\" align=\"center\" style=\"display: inline-block; padding: 0px; margin: 0px;\" class=\"tdBlock\"><img src=\"https://app.getresponse.com/images/common/templates/messages/1137/1/img/1137_03.png\" alt=\"\" width=\"44\" height=\"2\" border=\"0\" data-origsrc=\"https://app.getresponse.com/images/common/templates/messages/1137/1/img/1137_03.png\" data-src=\"https://app.getresponse.com/images/common/templates/messages/1137/1/img/1137_03.png|44|2|44|2|0|0|1\" style=\"border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;\"></td>
                          </tr>
                      </tbody></table>
                  </td>
              </tr>
              <tr>
                  <td valign=\"top\" align=\"center\" style=\"padding:0;margin:0;\">
                      <table align=\"center\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-editable=\"text\" class=\"text-block\">
                          <tbody>
                            <tr>
                              <td valign=\"top\" align=\"left\" class=\"lh-4\" style=\"padding: 24px 60px 16px; margin: 0px; line-height: 1.45; font-size: 16px; font-family: 'Times New Roman', Times, serif;\">
                                  <div style=\"font-family: Arial,sans-serif;font-size:16px;font-weight:400;color:#ffffff; line-height:1.4;\">
                                      <h3>Dados do contato</h3>
                                      <p style='color:#ffffff;'>Nome: -name-</p>
                                      <p style='color:#ffffff;'>Telefone: -telefone-</p>
                                      <p style='color:#ffffff;'>Email: -email-</p>

                                  </div>

                                  <span style=\"font-family: Arial,sans-serif;font-size:16px;font-weight:400;color:#000000; line-height:1.4;\">MENSAGEM</span>
                                  <div style=\"width: 100%; height: 150px; background-color: #ffffff; font-family: Arial,sans-serif;font-size:16px;font-weight:400;color:#000000; line-height:1.4;\">
                                      <p>-mensage-</p>
                                  </div>

                              </td>

                          </tr>
                      </tbody>
                    </table>
                  </td>
              </tr>
              <tr>
                  <td valign=\"top\" align=\"center\" style=\"padding:0;margin:0;\">
                      <div data-box=\"button\" style=\"width: 100%; margin-top: 0px; margin-bottom: 0px; text-align: center;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" data-editable=\"button\" style=\"margin: 0px auto;\">
                              <tbody>
                                <tr>
                                  <td valign=\"middle\" align=\"center\" class=\"tdBlock\" style=\"display: inline-block; padding: 15px 30px; margin: 0px; border-radius: 39px; background-color: rgb(255, 210, 52);\"><a href=\"\" style=\"font-family:Verdana,Arial,sans-serif;color:#2d8877;font-size:14px;font-weight:700;text-decoration:none;\">
                                        RESPONDER
                                      </a>
                                  </td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td valign=\"top\" align=\"center\" style=\"padding:0;margin:0;\">
                      <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" width=\"100%\" data-editable=\"line\" style=\"margin:0;padding:0;\">
                          <tbody><tr>
                              <td valign=\"top\" align=\"center\" style=\"padding: 25px 0px; margin: 0px;\"><div style=\"height:1px;line-height:1px;border-top-width:1px; border-top-style:solid;border-top-color:#51beaa;\">
                                      <img src=\"data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==\" alt=\"\" width=\"1\" height=\"1\" style=\"display:block;\">
                                  </div></td>
                          </tr>
                      </tbody></table>
                  </td>
              </tr>
              <tr>
                  <td valign=\"top\" align=\"center\" style=\"padding:0;margin:0;\">
                      <table align=\"center\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-editable=\"text\" class=\"text-block\">
                          <tbody><tr>
                              <td valign=\"top\" align=\"center\" class=\"lh-1\" style=\"padding: 25px 60px 16px; margin: 0px; line-height: 1.15; background-color: rgb(255, 255, 255); font-size: 16px; font-family: 'Times New Roman', Times, serif;\">
                                  <span style=\"font-family: Arial,sans-serif;font-size:14px;font-weight:400;color:#a0a0a0; line-height:1.1;\">
                                      Email de aviso de contato
                                  </span>
                              </td>
                          </tr>
                      </tbody></table>
                  </td>
              </tr>
              <tr>
                  <td valign=\"top\" align=\"center\" style=\"padding:0;margin:0;\">
                      <table align=\"center\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-editable=\"text\" class=\"text-block\">
                          <tbody><tr>
                              <td valign=\"top\" align=\"center\" class=\"lh-1\" style=\"padding: 0px 60px 30px; margin: 0px; line-height: 1.15; background-color: rgb(255, 255, 255); font-size: 16px; font-family: 'Times New Roman', Times, serif;\">
                                  <span style=\"font-family: Arial,sans-serif;font-size:14px;font-weight:400;color:#a0a0a0; line-height:1.1;\">
                                      © 2018 SIGes-A Sistema Integrado de Gestão de Alunos, All rights reserved.
                                  </span>
                              </td>
                          </tr>
                      </tbody></table>
                  </td>
              </tr>
          </tbody></table>
      </td>
  </tr>
</tbody>
</table>

</body>
</html>";
             
                 // set subject
                 $email->setSubject($subject);
             
                 // attach the body of the email
                 $email->setFrom($from);
                 $email->setHtml($html);
                 //$email->setText($text);
             
                // print_r($email);
                 // Your SendGrid account credentials
                 
                 $username = getenv('SENDGRID_USER');
                 $password  =getenv('SENDGRID_PASSWORD');
            
                 //outra forma de envio https://github.com/sendgrid/sendgrid-php

             
                 // Create SendGrid object
                 $sendgrid = new \SendGrid($username,$password);
             
                 // send message
                 $response = $sendgrid->send($email);
                 //print_r($response);
                 $status = $response->message; // [message] => success
                $cont = 0;
                //verificar
               while(true){
                 if($status == 'success'){

                     //salva no banco os dados do usuario e seta o status de envio para o adm como true
                    DB::table('user_contatos')
                    ->insert([
                         'nome_contato'=>$request->nome_contatoN,
                         'tel_contato'=>$request->tel_contatoN,
                         'email_contato'=>$request->email_contatoN,
                         'msg_contato'=>$request->textAreaContatoN,
                         'status_envio_email_adm'=>"true"
                    ]);

               
                    break;
                 }
                 if($status == 'error'){

                  //salva no banco os dados do usuario e seta o status de envio para o adm como false
                     DB::table('user_contatos')
                         ->insert([
                             'nome_contato'=>$request->nome_contatoN,
                             'tel_contato'=>$request->tel_contatoN,
                             'email_contato'=>$request->email_contatoN,
                             'msg_contato'=>$request->textAreaContatoN,
                             'status_envio_email_adm'=>"false"
                         ]);
                    
                    break;
                    
                 }
                 
                 $cont++;
               }


    }
}
