<script>
    const redirecttoForm = () => {
        document.location.href = "./index.php"
    }
</script>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST['send'])){
        if(empty($_POST['recieverEmail']) || empty($_POST['senderSubject']) || empty($_POST['senderMessage'])){
            echo"<script>
            alert('Fields are empty');
            redirecttoForm();
            </script>";
        }
        else{
            $mail = new PHPMailer(true);
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'promrizal@gmail.com'; //sender's email address
            $mail->Password = 'jhiqxmqcxhxmghky'; //app password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = '465';
    
            $mail->setFrom('promrizal@gmal.com'); //sender's email address
            $mail->addAddress($_POST['recieverEmail']);
            $mail->isHTML(true);
            $mail->Subject = $_POST['senderSubject'];
            $mail->Body = $_POST['senderMessage'];
            $mail->send();
            //after sending is successful the alert will run
            echo"<script>
                alert('Sent Successfully');
                redirecttoForm();
            </script>";
        }
    }

?>