


<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="info.js"></script>
</head>

<script>
	//alert(phn);
</script>




<body class="bg-dark  " >

<!--
<a href="https://api.whatsapp.com/send?phone="+phn+"" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

-->
 



 












<div     class="">



<form id="includedContent" role="form"      method="post" name="myform"   >

           
 



							

<div class="form-group"  hidden  >
    <label class="sr-only" for="r-form-1-first-name"> Name</label>
    <input type="text" name="name"  value="عبر واتساب مباشرة"   placeholder="الأسم" class="r-form-1-first-name form-control" id="r-form-1-first-name" required  >
</div>
 
 


<div class="form-group" hidden  >
    <label class="sr-only" for="r-form-1-email">Email</label>
    <input type="number"   name="phn" placeholder="رقم الهاتف " class="r-form-1-email form-control" id="r-form-1-email"   >
</div>


<div class="form-group" hidden  >
    <label class="sr-only" for="r-form-1-email">date</label>
    <input type="text" name="datetime" id="today_cta1" placeholder=" التاريخ  " class="r-form-1-email form-control" id="r-form-1-email"  >
</div>


 


 


 
<div class="form-group" hidden>
                                        <input name="source" type="text" class="form-control"    value="<?php
           require('../info.php');
//echo "wwe";
 
echo  $ad_source;

?>">
                                    </div>




















<br>
<button type="submit"  class="float"   > <i >


<i class="fa fa-whatsapp my-float"></i>

</i> 

</button>













     
            </form>
</div>



</body>






<style>


.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	left:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:0px;
}
</style>



<script>

 
$(document).ready(function () {

  $("#source_id_cta2").val(ad_source);


  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

	var currentdate = new Date(); 
var datetime = "" + currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + "  "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
                //alert(datetime);


                //$("#includedContent").load("form_name_phn_type.php"); 
                //$("#slider1").load("slider1.php"); 
                //$("#slider2").load("slider2.php"); 
                //$("#cta").load("cta_whatsapp.php"); 
                //$("#slider3").load("slider3.php"); 
                
               // $("#includedContent").load("form_name_phn.php"); 
                // $("#includedContent").load("form_only_whatsapp.php"); 
				
               // $("#count_down_counter").load("count_down.php");
    

      const scriptURL = action_url
  const form = document.forms['myform']

  form.addEventListener('submit', e => {
    
  
	//$(':input[type=submit]').prop('disabled', true)
  $('#today_cta1').attr('value', datetime )
  $("#myloader").show()
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => 
 
      
      google_response()
      
      
     
      
      
    
   
    
	
    
	  )
      .catch(error => console.error('Error!', error.message))
  })


    
  function google_response() {
    $("#myloader").hide();
    $("#done_icon").show();
     
    window.location.replace("https://wa.me/"+phn) ;
    
}
				 
	
});























 

</script>
<style>



 


</style>