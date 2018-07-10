<?php

namespace App\Listeners;

use App\Events\SomeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SendGrid\Email;

class EventListener
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
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SomeEvent $event)
    {    //pega a variavel request que é passada para o SomeEvent  
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
                $toList = array('handersonsylva@gmail.com','jhsbgs@gmail.com');//lista de usuario para enviar email
             
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
                 $email->addFilter('footer', 'enable', 1);
                // $email->addFilter('footer', "text/plain", "Thank you for your business");
                 $email->addFilter('footer', "text/html", "SIGes-A Sistema Integrado de Gestão de Alunos");
             
                 // The subject of your email
                 $subject = $assunto;
             
                 // Where is this message coming from. For example, this message can be from
                 // support@yourcompany.com, info@yourcompany.com
                 $from = $emailDe;
             
                 // If you do not specify a sender list above, you can specifiy the user here. If
                 // a sender list IS specified above, this email address becomes irrelevant.
                // $to = $emailPara;
             
                 # Create the body of the message (a plain-text and an HTML version).
                 # text is your plain-text email
                 # html is your html version of the email
                 # if the receiver is able to view html emails then only the html
                 # email will be displayed
             
                 /*
                 * Note the variable substitution here =)
                 */
                 
               /* $text = "
                 Hello -name-,
                 Thank you for your interest in our products. We have set up an appointment to call you at -time- EST to discuss your needs in more detail.
                 Regards,
                 Fred";*/
             
                
 
 
                 //layout do email
                 $html = "
                 <table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' data-editable='text' class='text-block>
                     <tbody><tr>
                         <td valign='top' align='center' class='lh-3' style='padding: 30px 60px 21px; margin: 0px; line-height: 1.35; font-size: 16px; font-family: 'Times New Roman', Times, serif;'>
                             -name- requer sua atenção,entrem em contato com ele por esse telefone -telefone- ou neste email -email- o mais rápido possivel!!!
                             </td>
                         </tr>
                         <tr>
                              <td valign='top' align='left' class='lh-4' style='padding: 24px 60px 16px; margin: 0px; line-height: 1.45; font-size: 16px; font-family: 'Times New Roman', Times, serif;'>
                                       <h3> Mensagem deixada por -name- </h3>
                                         <h4>-mensage-</h4>
                                         
                              </td>
 
                         </tr>
                     </tbody>
                 </table>  
                 ";
             
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
                // $username = var_dump(getenv('SENDGRID_USER'));
                //$password = var_dump(getenv('SENDGRID_PASSWORD'));
                 //outra forma de envio https://github.com/sendgrid/sendgrid-php
 
                
             
                 // Create SendGrid object
                 $sendgrid = new \SendGrid($username,$password);
             
                 // send message
                 $response = $sendgrid->send($email);
                 //print_r($response);
                 $status = $response->message; // [message] => success
                 
                   //verificar 
               while(true){
                 if($status == 'success'){

                    //Salva algo no banco para saber se o email admin foi enviado
                    
               
                    break;
                 }
                 if($status == 'error'){
                    
                  //Salva algo no banco para saber se o email admin foi enviado
                    
                    break;
                
                    
                 }
                 
                 $cont++;
               }
               

    }
}
