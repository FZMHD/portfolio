<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $subject = $_POST['Subject'];
  $option = $_POST['Option'];
  $message = $_POST['Message'];

  try{
    // $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "mohamedthahir1232000@gmail.com";
    $mail->Password = "1232000mhd";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('mohamedthahir1232000@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('mohamedthahir1232000@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received From FZMHD Portfolio';
    $mail->Body = "<h3>Name : $name <br>Email: $email  <br>Subject: $subject <br>Option: $option <br>Message : $message</h3>";
    
    $mail->send();
    $alert="
          <script>
            function CustomAlert(){
              swal(`Good job!`, `I Appreciate You Getting In Touch With Me 👍🙌`, `success`);
            };
            CustomAlert()
          </script>"
          ;
  } catch (Exception $e){
    $alert="
          <script>
            function CustomAlert(){
              swal(`Mail Server Error!`, `Something Went Wrong Please Try Again Later`, `warning`);
            };
            CustomAlert()
          </script>"
          ;
    
  }
}
?>
