<?php

//echo "wwe";
include 'init.php';
require 'phpmailer/index.php';
include 'info.php';


 



$username=$_POST['username'];
$phone=$_POST['phone'];
$url=$_POST['url'];
$customer=$_POST['customer'];


$username=trim($username);
$phone=trim($phone);
$url=trim($url);
$customer=trim($customer);




//echo $username.$phone.$url.$customer."<br>"; 
//echo send_mail("forsan20172017@gmail.com","NewMapReview@pscye.com","Psc@2023",$customer,$url,"smtp.hostinger.com","465");



$sql="select *  from users  where username='".$username."'";
$result=mysqli_query($con,$sql);
//echo "count =".mysqli_num_rows($result);
$users_count =mysqli_num_rows($result);

if($users_count>=1){
echo "user found ";

$sql="select *  from url_transactions  where customer='".$customer."'";
$result=mysqli_query($con,$sql);
$customer_count =mysqli_num_rows($result);
echo "customer url count  ".$customer_count;

if($customer_count<=$max_needed_number){





echo "<br> still we can add";




    $sql="INSERT INTO url_transactions(username,phone,customer,ut_url) VALUES ('".$username."','".$phone."','".$customer."','".$url."'  )";

//echo "insert stat ".mysqli_query($con,$sql);







try {
	





	if(mysqli_query($con,$sql)){

        echo send_mail("forsan20172017@gmail.com","NewMapReview@pscye.com","Psc@2023",$customer,$url,"smtp.hostinger.com","465");

        echo "<br> ok inserted ";
        

        echo '<script type="text/javascript">
        
        alert("تم  العملية بنجاح وتقييمك تحت المراجعة    ");
        window.open("index.php", "_self");
        
        </script>
        
        ';
     

       

        //echo send_mail("forsan20172017@gmail.com","NewMapReview@pscye.com","Psc@2023",$customer,$url,"smtp.hostinger.com","465");
     
        //echo send_mail("forsan20172017@gmail.com","NewMapReview@pscye.com","Psc@2023","فرسان","نعمه","smtp.hostinger.com","465");
	
	
 
	 
	}else{
 

	}


















} catch (Exception $ex) {
    
    echo("فشل");
    echo(mysqli_error($con));
    
    
    echo '<script type="text/javascript">
            
    alert("هذا التقييم موجود مسبقا ");
    window.open("index.php", "_self");
    
    </script>
    
    ';
}














































  















}
else{

    echo '<script type="text/javascript">
        
    alert("  تم تجاوز العدد المطلوب من التقييمات تواصل مع مدير المنصة ");
    window.open("index.php", "_self");
    
    </script>
    
    ';
    

}



}
else{

    echo "user not  found ";

    echo '<script type="text/javascript">
        
    alert("  تاكد من كتابة اسم المستخدم بشكل صحيح ");
    window.open("index.php", "_self");
    
    </script>
    
    ';

}














/*
 
$sql="select *  from url_transactions  where customer='".$customer."'";
$result=mysqli_query($con,$sql);
$response=array();

echo "count =".mysqli_num_rows($result);
/*

	while($row=mysqli_fetch_array($result))
	{
		 echo $row["id"];
	}
*/
/*
$sql="INSERT INTO url_transactions(phone,username,customer,ut_url) VALUES ('".$phone."','".$username."','".$customer."','".$url."'  )";


	if(mysqli_query($con,$sql)){


	echo("تمت بنجاح");
	
	
	
 
	 
	}else{
		echo("فشل");
echo(mysqli_error($con));
	}





*/






?>