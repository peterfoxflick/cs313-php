<?php
session_start();

$formData['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$formData['address'] = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$formData['zipCode'] = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_STRING);
$formData['state'] = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>Checkout</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 </head>
 <body>
   <div class="container" style="margin-top: 20px;">
     <div class="row">
       <div class="col">


         <table class="table">
           <thead>
             <tr>
               <th scope="col">#</th>
               <th scope="col">Name</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Total</th>
             </tr>
           </thead>
           <tbody>
             <?php
             $uberTotal = 0;
             if ( isset($_SESSION["cart"]) ) {
               foreach($_SESSION["cart"] as $item){
                 $total = $item[3] * $item[1];
                 $uberTotal += $total;
                 echo "<tr>
                  <th scope='row'>{$item[0]}</th>
                  <td>{$item[2]}</td>
                  <td>{$item[3]}</td>
                  <td>{$item[1]}</td>
                  <td>{$total}</td>
                  </tr>";
               }
             }

             echo "<tr>
              <th scope='row'></th>
              <td></td>
              <td></td>
              <td></td>
              <td>{$uberTotal}</td>
              </tr>";
             ?>
           </tbody>
         </table>

         <h4>Name</h4>
         <?php echo "<p>{$formData['name']}</p>" ?>

         <h4>Address</h4>
         <?php echo "<p>{$formData['address']}</p>" ?>

         <h4>State</h4>
         <?php echo "<p>{$formData['state']}</p>" ?>

         <h4>Zip Code</h4>
         <?php echo "<p>{$formData['zipCode']}</p>" ?>
       </div>
     </div>
   </div>


 </body>
 </html>
