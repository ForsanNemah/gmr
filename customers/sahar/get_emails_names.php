<?php
require('init.php');
 

 
 $username=$_POST['username'];
 //$username="forsan";
 $user_id;
 
 
 

 $sql="select * from users    WHERE   username='$username'                  ";
 $result=mysqli_query($con,$sql);
 $response=array();
 
     while($row=mysqli_fetch_array($result))
     {

          //echo $row["id"];
          $user_id=$row["id"];;
     }















 
  

 
$sql="select * from email_names    WHERE   user_id='$user_id'                  ";
$result=mysqli_query($con,$sql);
$response=array();

	while($row=mysqli_fetch_array($result))
	{
		 array_push($response,array("id"=>$row["id"],"em_name"=>$row["em_name"] ,
         
         "user_id"=>$row["user_id"]
         
         
       
		 
		 
		 
		 ));
	}


 
echo json_encode($response);
 
 
 
 
 
 
 
 
 
 
 
 

?>