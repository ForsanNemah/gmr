
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="title" content="">
    <meta property="description" content=" ">
    <meta property="url" content=" ">
    <meta property="site_name" content=" ">
    <meta property="og:type" content="">
    <meta property="og:title" content=" ">
    <meta property="og:description" content=" ">
    <meta property="og:url" content=" ">
    <meta property="og:site_name" content=" ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>
      
  
    <?php

include 'info.php';

 echo $info['website_title'];




?>

  
  
  </title>
    <style>
        /* WhatsApp Button */

        .whatsApp {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 10px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-whatsApp {
            margin-top: 9px;
        }
    </style>














<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
       
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
















<script type="text/javascript" src="info.js"></script>









 


 


 


 







</head>
<body>
  



<div 
class="bg-light  "
>
<div id="cta_whatsapp" >
 


</div>



<div id="cta_call">
 


</div>
</div>



















    <div>
        
    </div>
    <!-- Header -->
    <section class="container-fluid bg-primary head-nav">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="text-center header-logo">
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="logo">
                         





                        <?php


if ($handle = opendir('logo')) {


    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

 

  
  //echo "$entry\n";
  echo "
  
  
  
  <img   src='logo/$entry' class='img-fluid' alt='Responsive image' width='250px' height='250px' >
  
  
  
  ";
  
  
  break;
 

 
           
        }
    }

    closedir($handle);
}




?>











                        <h3 class="text-dark" style="font-size:1.2em!important">
                        
                        <?php

include 'info.php';

 echo $info['ev_logo_name'];




?>
                      
                      </h3>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Appointment Section -->






   

    <div id="count_down_counter">



</div>







    <section class=" appointment">
        <div class="appointment-section">
            <div class="container">


            
















                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form">
                            <div class="appointment-form text-center">



          

<div class="container h-100 d-flex justify-content-center">
<div class="appointment-title text-light" id="myloader"         >
<div class="loader"></div> 
</div>
</div>


<div class="container h-100 d-flex justify-content-center">

<div class="appointment-title text-light"  id="done_icon"  >
<img src="ads/done.gif" class="img-fluid" width='100px' height='100px' alt="Responsive image"   >

</div>

</div>







                                <form id="form" role="form"  action="post.php"     method="post" name="myform" bgcolor=”#800000">





                                    <p class="appointment-title text-light">     

                                    <?php

include 'info.php';

 echo $info['ev_form_sub1'];




?>
                                    
                                    </p>
                                    <p class="appointment-title text-light" style="font-size:1.2em;direction:rtl">   
                                  
                                  
                                  
                                  
                                    <?php

include 'info.php';

 echo $info['ev_form_sub2'];




?>
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  </p>












 




















                                    <div class="form-group" dir="rtl">
                                        <input name="username" type="text" class="form-control" placeholder="اسم المستخدم " required>
                                    </div>
 

                                    <div class="form-group" dir="rtl">
                                        <input name="phone" type="number" class="form-control" placeholder=" رقم الجوال    " required>
                                    </div>
 



  


                                    <div class="form-group" dir="rtl">
                                        <input name="url" type="text" class="form-control" placeholder=" رابط التقييم  " required>
                                    </div>
 


                                    <div class="form-group" dir="rtl" hidden>
                                        <input name="customer" type="text" class="form-control" placeholder=" " value ="safa2" required>
                                    </div>
 




                                    <div class="form-group" hidden>
                                        <input name="source" type="text" class="form-control"    value="<?php
           require('info.php');
//echo "wwe";
 
echo  $ad_source;

?>">
                                    </div>







<!--
                                    <div class="form-group ">
                                        <select name="type" id="servicerb" class="form-control" aria-label="عرض زراعة الأسنان" required>

                                        <?php

include 'info.php';




foreach ($items as $key => $value) {

echo "<option value='$value'>$value</option>";

}
?>




                                        </select>
                                    </div>

-->



                                    <div class="form-group"  hidden >
    <label class="sr-only" for="r-form-1-email">date</label>
    <input type="text" name="datetime" id="today" placeholder=" التاريخ  " class="r-form-1-email form-control" id="r-form-1-email"  >
</div>


<div class="form-group" hidden>
                                        <input name="w_link" id="w_link_id" type="text" class="form-control"   >
                                    </div>



                                    <button id="send" type="submit" class="btn submit-btn">رفع التقييم   </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 passion">
                        <div class="text-center text-lg-right">
                            <h4 class="text-light">
                            <?php

include 'info.php';

 echo $info['lt_sub1'];




?>
                            </h4>
                            <br />
                            <p class="text-light" style="font-size: 1.2em; font-size: 1.2em; font-family: inherit !important ">             <?php

include 'info.php';

 echo $info['lt_sub2'];




?>
             </p>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <br>
   <br>
    <section>



	<div class="how-it-works-container section-container section-container-gray-bg  "    >
	        <div class="container">

         
	            <div class="row">


               

<div id="slider1"></div>
           

  </div>	 
<br>

  <div class="row">
	                 

                   <div id="slider2"></div>
                              
                   
                     </div>	 


                     <br>

  <div class="row">
	                 

                   <div id="slider3"></div>
                              
                   
                     </div>	 
                   
                   




</div>
 </div>
</div>





















        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <a class="btn btn-primary" style="background-color: #1c3c49 " href="#form">    قيم واربح معنا الان </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">     
 
</div>
<!-- Copyright -->
<div class="footer-copyright text-center py-3">    جميع الحقوق محفوظة:
 
</div>
<!-- Copyright -->

</footer>

    <!-- <script src="js/jquery-3.4.1.min.js"></script> -->
    <!-- <script src="js/main.js"></script> -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    
    <script>






$(document).ready(function () {
  //alert(ad_source);

  //$("#source_id").val('dddd');

  //alert($("#source_id_form").val());

  var element = document.getElementById("myloader");
        element.style.display = "none"
        var done_icon = document.getElementById("done_icon");
        done_icon.style.display = "none"
 


  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

 
                //alert(datetime);


                //$("#includedContent").load("form_name_phn_type.php"); 
               // $("#slider1").load("slider1.php"); 
                //$("#slider2").load("slider2.php"); 
               // $("#cta_whatsapp").load("cta/cta_whatsapp.php"); 
          // $("#cta_call").load("cta/cta_call.php"); 
               // $("#slider3").load("slider3.php"); 
                
               // $("#includedContent").load("form_name_phn.php"); 
                // $("#includedContent").load("form_only_whatsapp.php"); 
				
               // $("#count_down_counter").load("count_down.php");
                //$("#tabel_1").load("tabel_1.php"); 
 
    

                

      const scriptURL = action_url
  const form = document.forms['myform']
 



  /*
  form.addEventListener('submit', e => {

    //waitingDialog.show();
    
    
	$(':input[type=submit]').prop('disabled', true)
  $('#today').attr('value', datetime )
  $('#w_link_id').attr('value', 'wa.me/'+$("#phn_id").val() )
  element.style.display = "block"
  //alert("progress")
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => 
 
      
      google_response()
      
      
     
      
      
    
   
    
	
    
	  )
      .catch(error => console.error('Error!', error.message))
  })

*/
    
  function google_response() {
   
   element.style.display = "none";
   done_icon.style.display = "block"
    
   window.location.replace("https://drive.google.com/drive/folders/12PbAW9ouDAQ1FsFAB6GRgtTuHLr5bLvH?usp=sharing") ;
   
} 
	
});







 

			












    </script>
</body>
</html>


<style>


.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}


/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
 
</style>
