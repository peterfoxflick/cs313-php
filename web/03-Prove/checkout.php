<?php
session_start();


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
         <a href='cart.php' class='btn btn-primary'>Back to Cart</a>
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


         <div class="row">
           <div class="col-md-6 offset-md-3">
             <form action="confirm.php" method="post">
               <div class="form-group">
                 <label for="nameInput">Name</label>
                 <input type="text" class="form-control" id="nameInput" name="name"><br>
               </div>
               <div class="form-group">
                 <label for="addressInput">Address</label>
                 <input type="text" class="form-control" id="addressInput" name="address"><br>
               </div>
               <div class="form-group">
                 <label for="stateInput">State</label>
                 <input type="text" class="form-control" id="stateInput" name="state"><br>
               </div>
               <div class="form-group">
                 <label for="zipInput">Zip Code</label>
                 <input type="text" class="form-control" id="zipInput" name="zipCode"><br>
               </div>


               <input type="submit" class="btn btn-primary" value="Checkout">
             </form>
           </div>
         </div>
       </div>

     </body>
</html>
