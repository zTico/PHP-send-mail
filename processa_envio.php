<?php   
    require_once "./bibliotecas/PHPMailer/Exception.php";
    require_once "./bibliotecas/PHPMailer/OAuth.php";
    require_once "./bibliotecas/PHPMailer/PHPMailer.php";
    require_once "./bibliotecas/PHPMailer/POP3.php";
    require_once "./bibliotecas/PHPMailer/SMTP.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mensagem {
        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($atributo){
           return $this->$atributo;
        }
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
        public function mensagemValida(){

            if(!empty(strlen($this->para)) && !empty(strlen($this->assunto)) && !empty(strlen($this->mensagem))) {
                return true;
            } 
            else {
                return false;
            }
        }
    }

    $mensagem = new Mensagem();
    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);
    echo $mensagem->mensagemValida();
   
    //echo '<pre>';  var_dump($mensagem);
    
    if(!$mensagem->mensagemValida()){
        header('Location:index.php?erro=Mensagem_Não_Enviada');
        die();
    } 

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'cericeteste@gmail.com';                 // SMTP username
        $mail->Password = 'cerice12345';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('cericeteste@gmail.com');
        $mail->addAddress($mensagem->__get('para'));     // Add a recipient          // Name is optional
        //$mail->addReplyTo('cericeteste@gmail.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                   // Set email format to HTML
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body = '
        <html>
            <head>
                <style type="text/css">
                    
                    .base{
                        width: 400px;
                        font-weight: bold;
                        background: #FF6347;
                        margin: auto;
                    }
                    .base h2{
                        color: white;
                        font-size: 30;
                        text-align: center;
                    } .base img{
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        width: 50%;
                    }
                    .verificar h2{
                        font-size: 25;
                    }
                    .meio {
                        text-align: center;
                        font-size: 18;
                    }
                    .meio2{
                        padding-top: 3px;
                        padding-bottom: 5px;
                    }
            
                </style>
            </head>
            <body>
            
            <div class="base">
                <h2>HoHoHoHoHo</h2> 
                <img src="https://imagensemoldes.com.br/wp-content/uploads/Papai-Noel-1200x900.png" width="250px">
                <div class="verificar">
                    <h2>Verifiquei que seu assunto é: <br> '.$mensagem->__get('assunto').'</h2>
                    <h2>E sua mensagem é: <br> '.$mensagem->__get('mensagem').'</h2>
                </div>	
                    <div class="meio">
                        Logo iremos dar um retorno. <br>	
                        <div class="meio2">Boas festar. Hohoho</div>
                    </div>
            
            </div>
            </body>
        </html>';
       // $mail->AltBody = 'Mensagem al email:';

        $mail->send();
       
            if($mail){
                function redireciona($link){
                    if ($link==-1){
                    echo" <script>history.go(-1);</script>";
                    }else{
                    echo "<script>alert('E-mail enviado com sucesso');</script>" ;  
                    echo" <script>document.location.href='$link'</script>";
                    }
                };
           
               $link = 'index.php';
               redireciona($link); 
            }

    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: Erro ao execultar ';
    }

    


   
    



 
