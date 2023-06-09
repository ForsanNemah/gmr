<h2>  
  

<?php

include 'info.php';

 echo $info['sidebar2_msg'];




?>




</h2>
<br>

<div id="myCarousel2" class="carousel slide" data-ride="carousel"  >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel2" data-slide-to="1"></li>
      <li data-target="#myCarousel2" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" >

	
      

    <?php


if ($handle = opendir('sidebar2')) {
  $counter=0;

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

if( $counter==0){

   
  echo "<div class='item  active '>
  
  <img src='sidebar2/$entry' class='img-responsive' alt='Responsive image'   >

  </div>
  ";
  echo " ";
  echo "";


}
else{

  
 
  echo "<div class='item '>
  
  <img src='sidebar2/$entry' class='img-responsive' alt='Responsive image'   >

  </div>
  ";
  echo " ";
  echo "";
  

}
$counter++;
           
        }
    }

    closedir($handle);
}




?>

         

         
    
       

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel2" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>
  
  </div>