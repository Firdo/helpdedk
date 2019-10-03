<?php 

 $myfile = fopen("email_status.txt", "a");
 $err="Hello";
 $name="Okay";
 $err2="\r\n".$err.$name;
$no=fwrite($myfile, $err2);
fclose($myfile);
if($no){
    echo'Success';
}

else{
    echo'failed';
}

?>