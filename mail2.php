<?php

$to="test-idac7@mail-tester.com";
$subject="DGPS IT";
$message="Hi , Sir We have received your Complaint our IT reps will be there ASAP. Thank you. Regards, Farith";
    
    $headers = 'From:  dgps.it@dgpspdp.in' . "\r\n" .
    'Reply-To:  dgps.it@dgpspdp.in' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $mail=mail($to, $subject, $message, $headers);
    if($mail){
        echo 'Successfully Sent';
    }
    ?>