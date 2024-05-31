<?php

// include ('../view/cus/quenmatkhau/checkEmail_exist.php');
$err=array();
if(isset($_POST['send']))
{
    $email=$_POST['email'];
    $_SESSION['email']=$email;
    
    if(empty($email)){
        $err['email']='Bạn chưa nhập email';
    }

    if(empty($err)){
        
        if(CheckEmailExist($email)){
            require ("../view/cus/quenmatkhau/PHPMailer-master/src/PHPMailer.php");
            require ("../view/cus/quenmatkhau/PHPMailer-master/src/SMTP.php");
            require ("../view/cus/quenmatkhau/PHPMailer-master/src/Exception.php");


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer\PHPMailer\PHPMailer();


            //Server settings
            $mail->SMTPDebug = 1;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'gourmezfood123@gmail.com';       //SMTP username
            $mail->Password   = 'wdou acbq frvw pbro';                  //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('gourmezfood123@gmail.com');
            $mail->addAddress($email);     //Add a recipient
            // $mail->addAddress('22521032@gm.uit.edu.vn');
            //$mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->setLanguage('vn', '/optional/path/to/language/directory/');
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password recovery email';
            $mail->Body    = ' Click here:';
            

            //To load the French version
            
            if($mail->send())
            {   echo 'Message has been sent';
                header ('Location: ../view/cus/quenmatkhau/resetPassword.php');}
            else {
            echo "Message could not be sent. Mailer Error:".$mail->ErrorInfo;
            }
        
        }
        else{
            $err['exist']='Tài khoản email không tồn tại trong hệ thống';
        }
    
    }
}
?>

<link rel="stylesheet" href="../view/cus/quenmatkhau/forgotpass.css">
<form class="box-content" method="post">
    <h2>Quên mật khẩu?</h2>
    
    <span><h3>Địa chỉ email</h3>
    <input type="email" name="email" ></span><br>
    <span class="has-error"><?php echo (isset($err['email']))?$err['email']:''?></span>
    <div></div>
    <span class="has-error"><?php echo (isset($err['exist']))?$err['exist']:''?></span>
    <Div></Div>
    <input type="submit" name="send" value="Gửi">
</form>