<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\EventEmail;
use SendGrid\Email;
use \Illuminate\Support\Facades\DB;
use Exception;

class EmailController extends Controller
{

    public function  enviarEmailUser( Request $request){
       
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
            
               


                
                $html = "<!DOCTYPE html>
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
                                      <h4 style='color:#ffffff;'>Sistema Integrado de Gestão de Alunos</h4>
                                      <p style='color:#ffffff;'>Telefone: (00)00000-0000</p>
                                      <p style='color:#ffffff;'>Email: central@siges-a.com.br</p>

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
                $password  =getenv('SENDGRID_PASSWORD');
                
                //$username = var_dump(getenv('SENDGRID_USER'));
                //$password = var_dump(getenv('SENDGRID_PASSWORD'));

            
                // Create SendGrid object
                $sendgrid = new \SendGrid($username, $password);
            
                // send message
                $response = $sendgrid->send($email);
                //print_r($response);
                $status = $response->message; // [message] => success
                $cont = 0;
                //verificar 
              while(true){
                if($status == 'success'){
                  //Chamar o event que envia o email para os admin
                   event(new EventEmail($request));
                   return redirect()->route('home.contato.emailsuccess');

                            
                   break;
                }
                if($status == 'error'){

                    return redirect()->route('home.contato.email_error');
                    break;

                }
                
                $cont++;
              }

                
    }
    

    
    public function emailSuccess(){
        //salvar dados do usuario aqui.
        //echo "Sucesso";
      return view('layouts.home.confirmacao_email');
     // return redirect()->action('HomeController@index');
     }

     public function emailFalha(){
        //salvar dados do usuario aqui.
        return view('layouts.home.erro_envio_email');
      // return view('layouts.home.confirmacao_email');
     // return redirect()->action('HomeController@index');
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
