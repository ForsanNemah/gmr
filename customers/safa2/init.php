<?php

session_start();

$host="localhost";
$db_user="root";
$db_password="";
$db_name="getmonyfromgmail";
$con = mysqli_connect($host,$db_user,$db_password,$db_name);

 if($con){
echo "ok";
}
else{
echo "not ok";

}
 
  

?>

