<?php

namespace App\Libs\Envio_email_sendGrid;
use App\Http\Controllers\Controller;
use App\UserContato;
use SendGrid\Email;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\HomeContatoRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Events\EventEmail;


 class Enviar_email extends Controller
{

     /**
      * @param $request
      * @return string
      */
     public function  enviarEmailUser($request){
        //Função que vai enviar um email para o usuario quando ele entrar em contato
 

             /* This example is used for sendgrid-php V2.1.1 (https://github.com/sendgrid/sendgrid-php/tree/v2.1.1)
                        https://docs.microsoft.com/pt-br/azure/store-sendgrid-php-how-to-send-email
                */
               
                //get dados
                $nome = $request->nome_contatoN;
                $telefone = $request->tel_contatoN;
                
                $assunto = "Contato SIGes-A";
                $emailDe = "contato@sigesa.com";//Email da empresa o qual vai retornar o contato automatico para o cliente
                $emailPara = isset($_POST['email_contatoN'])?$_POST['email_contatoN']:" ";
               
                
              
                $email = new Email();
                // The list of addresses this message will be sent to
                // [This list is used for sending multiple emails using just ONE request to SendGrid]
               // $toList = array($emailParaC,'jhsbgs@gmail.com');//lista de usuario para enviar email
            
                // Specify the names of the recipients
                $nameList = array($nome);
            
                // Used as an example of variable substitution
                $telList = array($telefone);
                $emailList =array($emailPara);

            
                // Set all of the above variables
                // $email->setTos($toList);
                 $email->addSubstitution('-name-', $nameList);
                 $email->addSubstitution('-telefone-', $telList);
                 $email->addSubstitution('-email-', $emailList);
            
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
                $to = $emailPara;
            
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
                  <td align=\"center\" valign=\"top\" style=\"margin:0;padding:0;\">
                      <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" data-editable=\"image\" data-mobile-stretch=\"0\" width=\"42%\">
                          <tbody><tr>
                              <td valign=\"top\" align=\"center\" style=\"display: inline-block; padding: 0px; margin: 0px;\" class=\"tdBlock\"><img src=\"http://omartelodenietzsche.com/wp-content/uploads/2018/01/Cursos-Online-Gratis.jpg\" alt=\"\" width=\"500\" height=\"206\" border=\"0\" style=\"border-width: 0px; border-style: none; border-color: transparent; font-size: 12px; display: block;\" data-src=\"http://omartelodenietzsche.com/wp-content/uploads/2018/01/Cursos-Online-Gratis.jpg\" data-origsrc=\"http://omartelodenietzsche.com/wp-content/uploads/2018/01/Cursos-Online-Gratis.jpg\"></td>
                          </tr>
                      </tbody></table>
                  </td>
              </tr>
              <tr>
                  <td valign=\"top\" align=\"center\" style=\"padding:0;margin:0;\">
                      <table align=\"center\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-editable=\"text\" class=\"text-block\">
                          <tbody><tr>
                              <td valign=\"top\" align=\"center\" class=\"lh-3\" style=\"padding: 30px 60px 21px; margin: 0px; line-height: 1.35; font-size: 16px; font-family: 'Times New Roman', Times, serif;\">
                                  <span style=\"font-family:Verdana,Arial,sans-serif;font-size:20px;font-weight:400;color:#fffefe; line-height:1.3; text-align: justify; \">
                                     Olá -name-, Obrigado por entrar em contato conosco, em breve entraremos em contato com você pelo telefone -telefone- ou neste email -email-, mas em caso de urgência você poderá usar nossos contatos logo abaixo, Obrigado e Até breve!!!</span>
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
                                  <div style=\"font-family: Arial,sans-serif;font-size:16px;font-weight:400;color:#ffffff; line-height:1;\">
                                      <h3>SIGes-A</h3>
                                      <h4>Sistema Integrado de Gestão de Alunos</h4>
                                      <p>Telefone: (00)00000-0000</p>
                                      <p>Email: central_suporte@siges-a.com.br</p>

                                  </div>

                              </td>

                          </tr>
                      </tbody>
                    </table>
                  </td>
              </tr>
              <tr>
                 
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
                                      Email de confirmação para o usuário
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
</html>

                ";
            
                // set subject
                $email->setSubject($subject);
            
                // attach the body of the email
                $email->setFrom($from);
                $email->setHtml($html);
                $email->addTo($to);
                //$email->setText($text);
               // echo $_ENV['SENDGRID_USER'];
               // print_r($email);
                // Your SendGrid account credentials
                $username = getenv('SENDGRID_USER');
                $password  = getenv('SENDGRID_PASSWORD');
                
                //$username = var_dump(getenv('SENDGRID_USER'));
                //$password = var_dump(getenv('SENDGRID_PASSWORD'));


        try{

            // Create SendGrid object
            $sendgrid = new \SendGrid($username, $password);

            // send message
            $response = $sendgrid->send($email);
            //print_r($response);
            $status = $response->message; // [message] => success

            if($status == 'success'){
                //enviar amail para os admin do projeto
                $result = $this->envioEmailAdm($request);
                return $result;

            }else{


            }

        }catch (Exception $e){
            return $e->getMessage();
        }
            
<<<<<<< HEAD

=======
                // Create SendGrid object
                $sendgrid = new \SendGrid($username, $password);
            
                // send message
                $response = $sendgrid->send($email);
                //print_r($response);
                $status = $response->message; // [message] => success
              
                if($status == 'success'){
                    //enviar amail para os admin do projeto
                    $this->envioEmailAdm($request);
                    return redirect()->action('HomeController@emailSuccess');
                   
                }else{
                    
                   
                }
     
                
>>>>>>> upstream/master
    }

    public function envioEmailAdm($request){
        
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
               $toList = array('handersonsylva@gmail.com','frandosax@gmail.com','jhsbgs@gmail.com',);//lista de usuario para enviar email
            
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
                //$email->addFilter('footer', 'enable', 1);
               // $email->addFilter('footer', "text/plain", "Thank you for your business");
                //$email->addFilter('footer', "text/html", "SIGes-A Sistema Integrado de Gestão de Alunos");
            
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
                                  <span style=\"font-family:Verdana,Arial,sans-serif;font-size:20px;font-weight:400;color:#fffefe; line-height:1.3;\">
                                  -name- requer sua atenção, retorne o mais rápido possível.</span>
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
                                  <div style=\"font-family: Arial,sans-serif;font-size:14px;font-weight:400;color:#ffffff; line-height:1.4;\">
                                      <h3>Dados do contato</h3>
                                      <p>Nome: -name-</p>
                                      <p>Telefone: -telefone-</p>
                                      <p>Email: -email-</p>

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
</html>

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

<<<<<<< HEAD
        try{
            // Create SendGrid object
            $sendgrid = new \SendGrid($username,$password);

            // send message
            $response = $sendgrid->send($email);
            //print_r($response);
            $status = $response->message; // [message] => success

            if($status == 'success'){
                //faça algo;
                //router layout de confirmação de envio
                //get dados
                $this->emailSuccess();
                //dados para salvar no banco
                $data = array('nome'=>$nome,'telefone'=>$telefone,'email'=>$emailUser,'msg'=>$msgUsuario);
                $this->salvaDados($data);


            }else{
                // faça algo;
                //echo($status);
            }


        }catch (Exception $e){
            return $e->getMessage();
        }

=======
               
            
                // Create SendGrid object
                $sendgrid = new \SendGrid($username,$password);
            
                // send message
                $response = $sendgrid->send($email);
                //print_r($response);
                $status = $response->message; // [message] => success
                
                if($status == 'success'){
                    //faça algo;
                    //router layout de confirmação de envio
                    //return redirect()->route('home.contato.emailsuccess');
                    //$this->emailSuccess();
                     //chamada do event
                     
                    event(new EventEmail());
                }else{
                   // faça algo;
                   //echo($status);
                   //return redirect()->action('HomeController@emailSuccess');
                   //event(new EventEmail());
                }
               
     
>>>>>>> upstream/master

    }
    public function emailSuccess(){
        //salvar dados do usuario aqui.
       //return view('layouts.home.confirmacao_email');
        return \view('home.contato.emailsuccess');

    }

    private function salvaDados($data){

        $data_form = $data;
        //dd($data_form["nome"]);
        $user_data = DB::table('user_contatos')
            ->insert([
                'nome_contato'=>$data_form["nome"],
                'tel_contato'=>$data_form["telefone"],
                'email_contato'=>$data_form["email"],
                'msg_contato'=>$data_form["msg"]
            ]);


    }
   
}
