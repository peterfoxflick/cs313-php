<?php

session_start();


// Removing item
if ( isset($_GET["delete"]) ) {
 $id = $_GET["delete"];

 if (isset($_SESSION["cart"][$id])) {
   if ($_SESSION["cart"][$id][1] == 1) {
     unset($_SESSION["cart"][$id]);

   } else {
     $_SESSION["cart"][$id][1] = $_SESSION["cart"][$id][1] - 1;

   }
 }
}

// Removing item
if ( isset($_GET["clear"]) ) {
 if (isset($_SESSION["cart"])) {
     unset($_SESSION["cart"]);

 }
}


//Adding a new item
if ( isset($_GET["add"]) ) {
  $id = $_GET["add"];
  if (isset($_SESSION["cart"][$id])) {
    $_SESSION["cart"][$id][1] = $_SESSION["cart"][$id][1] + 1;
  } else {
    $_SESSION["cart"][$id][0] = $id;
    $_SESSION["cart"][$id][1] = 1;
    $_SESSION["cart"][$id][2] = $items[$id]->name;
    $_SESSION["cart"][$id][3] = (float)$items[$id]->price;
  }
}


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>Cart</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


 </head>
 <body>
   <div class="container" style="margin-top: 20px;">
     <div class="row">
       <div class="col">
         <a href='index.php' class='btn btn-primary'>Back to Shopping</a>
         <a href='?clear' class='btn btn-warning'>Clear Cart</a>
         <a href='checkout.php' class='btn btn-success'>Checkout</a>

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
             if ( isset($_SESSION["cart"]) ) {
               foreach($_SESSION["cart"] as $item){
                 $total = $item[3] * $item[1];
                 echo "<tr>
                 <th scope='row'>{$item[0]}</th>
                 <td>{$item[2]}</td>
                 <td>{$item[3]}</td>
                 <td><a href='?delete={$item[0]}'><i class='fas fa-minus-circle'></i></a>{$item[1]}<a href='?add={$item[0]}'><i class='fas fa-plus-circle'></i></a></td>
                 <td>{$total}</td>
                 </tr>";
               }
             }

             ?>
           </tbody>
         </table>

       </div>
     </div>
   </div>


 </body>
 </html>
