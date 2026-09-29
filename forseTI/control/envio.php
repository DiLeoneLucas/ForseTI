<?php
session_start();
require("db_classes.php");
$stats = 1;


$nome = $_POST['nome'];
$email = $_POST['mail'];
$option = $_SESSION['option'];
$categoria = $_SESSION['tipo_de_ficha'];


echo $email."<br>".$option."<br>".$categoria;


$sql = "INSERT INTO ficha (tipo, status_ficha, categoria, nome, email) VALUES ('$option', '$stats', '$categoria', '$nome', '$email') ";
$objDb = new db();
$connect = $objDb->conecta_mysql();

if (mysqli_query($connect, $sql)) {
    // Obtém o ID do último registro inserido
    $num = mysqli_insert_id($connect);
}else{
    echo "Erro";
}


$sql_hora = "SELECT NOW()";
$objDb = new db();
$connect = $objDb->conecta_mysql();

// Executa a query
$result = mysqli_query($connect, $sql_hora);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $horario = $row['NOW()'];  // Pega o valor retornado pela função NOW()
    
    $vetor = explode(" ", $horario);
    $hora = $vetor[1]; // Pega só a parte da hora

} else {
    echo "Erro na consulta SQL.";
}


$sql = "SELECT * FROM v_ficha WHERE id_ficha = '$num' " ;
$objDb = new db();
$conncet = $objDb->conecta_mysql();
$q_consulta = mysqli_query($conncet, $sql);

$controle = $q_consulta->num_rows;

if(!$email){
    header("Location: retirada.php");
}

if($controle>0){

    while($linha = mysqli_fetch_assoc($q_consulta)){
		$corpo = '<b>ATENCAO</b><br>Informamos que a sua ficha para ser atendido é: '.$linha['id_ficha'].'<br>Seu "Usuário" é '.$nome.' e seu tipo de atendimento é '.$linha['tipo'].' de categoria '.$linha['categoria'];

	}
}

echo "<br><br>ID: ".$num."<br>".$corpo;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($num)){

$mail = new PHPMailer(true);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dileonelucas@gmail.com';                     //SMTP username
    $mail->Password   = 'ajiirswxvhxcscwp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dileonelucas@senacrs.com.br', 'Atendimento');
    $mail->addAddress($email);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('dileonelucas@senacrs.com.br', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'FICHA PARA ATENDIMENTO';
    $mail->Body    = $corpo;
    $mail->AltBody = $corpo2;

    $mail->send();
    echo 'Message has been sent';
   header("Location: retirada.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
//header("Location: retirada.php");
?>