


<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="info.js"></script>
</head>

<script>
	//alert(phn);
</script>




<body class="  ">

<!--
<a href="https://api.whatsapp.com/send?phone="+phn+"" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

-->
 


<form id="includedContent" role="form"      method="post" name="myform2">

           
 



							

<div class="form-group"  hidden  >
    <label class="sr-only" for="r-form-1-first-name"> Name</label>
    <input type="text" name="name"  value=" اتصال هاتفي   مباشرة"   placeholder="الأسم" class="r-form-1-first-name form-control" id="r-form-1-first-name" required  >
</div>
 
 


<div class="form-group" hidden  >
    <label class="sr-only" for="r-form-1-email">Email</label>
    <input type="number"   name="phn" placeholder="رقم الهاتف " class="r-form-1-email form-control" id="r-form-1-email"   >
</div>


<div class="form-group" hidden  >
    <label class="sr-only" for="r-form-1-email">date</label>
    <input type="text" name="datetime" id="today_cta2" placeholder=" التاريخ  " class="r-form-1-email form-control" id="r-form-1-email"  >
</div>


 


<div class="form-group" hidden >
                                        <input name="source" type="text" class="form-control"    value="<?php
           require('../info.php');
//echo "wwe";
 
echo  $ad_source;

?>">
                                    </div>


 





















<br>
<button type="submit"  class="float2"   > <i >


<i class="  my-float2">



<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
</i>



</i> 



</button>













     
            </form>

</body>






<style>


.float2{
	position:fixed;
	width:60px;
	height:60px;
	bottom:110px;
	left:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float2{
	margin-top:0px;
}
</style>



<script>

 
$(document).ready(function () {


  $("#source_id_cta1").val(ad_source);

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
  const form = document.forms['myform2']

  form.addEventListener('submit', e => {
    
	 
	//$(':input[type=submit]').prop('disabled', true)
  $('#today_cta2').attr('value', datetime )
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
     
    window.location.replace("tel:+"+phn) ;
    
}
				 
	
});























 

</script>
