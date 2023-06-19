<?php
require 'index.php';
 

$reciver_email="ziadmuzaffar@gmail.com";//form the form


//select username and pass where maian email =$reciver_email;//
$full_subject="subject by zezo ";
$message="body  by zezo ";

echo send_mail("$reciver_email","GoogleMapReviews@pscye.com","Psc@2023",$full_subject,$message,"smtp.hostinger.com","465");

?>