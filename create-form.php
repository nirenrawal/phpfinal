<!-- install PHP Mailer -->
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'finalphp89@gmail.com';                     //SMTP username
    $mail->Password   = 'rkxfqnuiqfkoypki';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('finalphp89@gmail.com');
    $mail->addAddress('nirendra79@hotmail.com');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Registration completed ';
    $mail->Body    = 'Thank you  for  registrating in our system.  <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// all of the above is to generate the email after registering the user......................


include('header.php');
require_once('create.php');
?>
    <section class="pt-5">
        <div class="row">
            <div class="container">
                <div class="jumbotron">
                    <h1 class="display-4 text-center">Create a profile</h1>
                    <p class="lead">Please enter your credentials to register.</p>
                    <hr class="my-4">
            

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <?php //set_csrf()?>
                        <div class="form-group">
                          <label for="name">Full Name</label>
                          <input name="name" type="text" class="form-control" id="name" placeholder="Enter Full Name">
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input name="dob" type="date" class="form-control" id="dob">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" type="text" class="form-control" id="address" placeholder="Enter Address"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="picture">Profile Picture</label>
                            <input name="picture" type="file" class="form-control" id="picture">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                          </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input name="confirmpassword" type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password">
                          </div>

                        <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure, you want to register?'); window.location='profile.php'">Register</button>
                      </form>
                  </div>
            </div>
        </div>
    </section>

  <?php include("footer.php");?>

