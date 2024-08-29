<?php 

  $to = "asd123@gmail.com"; 
  $sub = "Generic Mail"; 
  $msg = $_POST['erortxt']; 
  $headers = 'From: asd123@gmail.com' . "\r\n" .'CC: another@example.com'; 
  if(mail(htmlspecialchars($to,$sub,$msg,$headers))) {
    echo "Your Mail is sent successfully."; 
  } else {
    echo "Your Mail is not sent. Try Again.";
  }

?>  