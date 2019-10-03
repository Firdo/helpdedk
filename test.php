<?php

$curl = curl_init();

$email="firdous.f@dubaigem.ae";
$id1=$row['id'];
$id=IT_SR_.$id1;
$name=$row['name'];
$problem="I look forward to your reply and a resolution to my problem and will wait until before seeking help from a consumer protection agency or the Better Business Bureau. Please contact me at the above address or by phone at home and or office numbers with area code";


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.pepipost.com/v2/sendEmail",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"personalizations\":[{\"recipient\":\"$email\"}],\"from\":{\"fromEmail\":\"support@dgpspdp.in\",\"fromName\":\"IT Support\"},\"subject\":\"Complaint – Ticket NO $id\",\"content\":\"Dear $name <br><br><br><br>We received your complaint, and our Technical Support team is now looking into the issue. Thank you for bringing this matter to our attention.<br><br> <b>Your Complaint Detail:</b><br><br>   <i>$problem</i><br><br><b>Status:</b> <color=green>Open<br><br><br>Within 24 hour, we will provide a more substantive response to your problem and a suitable solution.<br><br>Thank you for contacting Support Center<br><br><br><br>Best regards,<br>Virtual Assistant<br>IT Support Center-DGPS \"}",
  CURLOPT_HTTPHEADER => array(
    "api_key: bc691451fb168e078d741e49031f83d6",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
if ($err) {
    
    echo $err;
}

else {
       echo $response; 
    
}


?>

    <?php if($_SESSION['type']=='primary' || $_SESSION['type']=='secondary' || $_SESSION['type']=='admin1') { ?>
    
    <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c6924b8f324050cfe339af1/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

<?php
}?>
