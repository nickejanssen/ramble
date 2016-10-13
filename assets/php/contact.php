<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = 'From: Riverstreet Rambles'; 
    $to = 'toursavannah@gmail.com'; /*Replace with your email*/
    $subject = 'Riverstreet Rambles Message';
    $headers = 'From: tour@riverstreetrambles.com' . "\r\n" .
    'Reply-To: tour@riverstreetrambles.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

    function spamcheck($field){
        $field=filter_var($field, FILTER_SANITIZE_EMAIL);
        if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return TRUE;
        }
        else{
        return FALSE;
        }
    }

    if (isset($_REQUEST['email'])){
    $mailcheck = spamcheck($_REQUEST['email']);
    if ($mailcheck==FALSE){
    echo "You have inserted incorrect email address or have left some of the fields empty";
     sleep(5);
    }
    else{
    //send email
    mail("toursavannah@gmail.com",$subject, $body, $headers );
    echo "Thank you for contacting us! We will get in touch with you soon!";
     sleep(5);
     header("Location: http://www.riverstreetrambles.com"); /* Redirect browser */
     exit();
    }
    }
    
    ?>

