


<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
<script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  







<?php

include 'w_app.php';
include 'head/index.php';

 




?>
















 

<br>
<br>

 
         <input type="text" class="form-control" id="sbox_id" placeholder="جميع الخدمات متوفرة ابحث هنا " style="width: 100%;height: 40px;text-align: center; font-size:15px;" onkeyup="myFunction()">

<br>
<br>







<?php
class Api
{
    /** API URL */
    public $api_url = 'https://secsers.com/api/v2';

    /** Your API key */
    public $api_key = '87d3a67c630b23ec82c18b34cb0902f4';

    /** Add order */
    public function order($data)
    {
        $post = array_merge(['key' => $this->api_key, 'action' => 'add'], $data);
        return json_decode($this->connect($post));
    }

    /** Get order status  */
    public function status($order_id)
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'status',
                'order' => $order_id
            ])
        );
    }

    /** Get orders status */
    public function multiStatus($order_ids)
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'status',
                'orders' => implode(",", (array)$order_ids)
            ])
        );
    }

    /** Get services */
    public function services()
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'services',
            ])
        );
    }

    /** Refill order */
    public function refill(int $orderId)
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'order' => $orderId,
            ])
        );
    }

    /** Refill orders */
    public function multiRefill(array $orderIds)
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'orders' => implode(',', $orderIds),
            ]),
            true,
        );
    }

    /** Get refill status */
    public function refillStatus(int $refillId)
    {
         return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'refill' => $refillId,
            ])
        );
    }

    /** Get refill statuses */
    public function multiRefillStatus(array $refillIds)
    {
         return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'refills' => implode(',', $refillIds),
            ]),
            true,
        );
    }

    /** Get balance */
    public function balance()
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'balance',
            ])
        );
    }

    private function connect($post)
    {
        $_post = [];
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name . '=' . urlencode($value);
            }
        }

        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }
}













$api = new Api();

$services = $api->services(); # Return all services

//print_r( $services);

echo "
 

<div class='text-center'>
<h2>No of Services= ".sizeof($services)."</h2>
<br>
</div>

";



$services_1 =json_encode($services);
//echo $services_1;






$array = json_decode($services_1, true);








echo "


 
<table class='table table-bordered' id='services_table_id'>
  <thead>
    <tr>
      
    <th scope='col'>#</th>
      <th scope='col'>service</th>
      <th scope='col'>(price/1000)</th>
 
      <th scope='col'>max</th>
      <th scope='col'>order</th>
    </tr>
  </thead>
  <tbody>

   
";
    

foreach($array as $values) {



    if (str_contains($values['name'], "secsers")) {
        continue;
    }




    //echo $values['name'];
    //echo "<br>";
    $name_without_space = preg_replace('/\s+/', '%20', $values['name']);
    $final_price=$values['rate']*2;

echo "
<tr>
<td>".$values['service']."</td>
<td>".$values['name']."</td>
<td>".$final_price."$</td>
 
<td>".$values['max']."</td>

 
<td>

<a href='https://api.whatsapp.com/send?phone=966568430828&text=احتاج%20تنفيذ%20هذه%20الخدمة%20id%20".$values['service']."%20".$name_without_space."                          '>

<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-whatsapp' viewBox='0 0 16 16'>
<path d='M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z'/>
</svg>

</a>



</td>

</tr>


";


 
}






   




echo "
  </tbody>
</table>;
 

";












 






 










 
    

?>



 
<style>


::placeholder {
   text-align: center; 
   font-size: 15px;
}
</style>



<script>

//alert("wwe");


function myFunction() {
  var input, filter, table, tr, td, i,j,txtValue;
  input = document.getElementById("sbox_id");
  filter = input.value.toUpperCase();

  table = document.getElementById("services_table_id");
  tr = table.getElementsByTagName("tr");

for (i = 1; i < tr.length; i++) {
    // Hide the row initially.
    tr[i].style.display = "none";

    td = tr[i].getElementsByTagName("td");
    for (var j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        } 
      }
    }
}


}




</script>



<style>

@media only all and (max-width: 950px) {
  

 
.table td, .table th {
        font-size: 12px;
    }

}







</style>