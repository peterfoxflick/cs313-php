<?php

session_start();

class Item
{
    public $id;
    public $name;
    public $desc;
    public $price;
}

$newItem = new Item();
  $newItem->id = 001;
  $newItem->name = 'Telephoto Camera';
  $newItem->desc = 'This camera is perfect for getting far away shots.';
  $newItem->price = 499.99;

$items = array($newItem);

$newItem1 = new Item();
  $newItem1->id = 002;
  $newItem1->name = 'Pocket Camera';
  $newItem1->desc = 'This camera is great and portable';
  $newItem1->price = 299.99;

array_push($items, $newItem1);

$newItem2 = new Item();
  $newItem2->id = 003;
  $newItem2->name = 'Vintage Camera';
  $newItem2->desc = 'Throw back to this camera flashback.';
  $newItem2->price = 399.99;

array_push($items, $newItem2);

// Removing item
if ( isset($_GET["delete"]) ) {
 $id = $_GET["delete"];

 if (isset($_SESSION["cart"][$id][$qty])) {
   if ($_SESSION["cart"][$id][$qty] > 1) {
     $_SESSION["cart"][$id][$qty] = $_SESSION["cart"][$id][$qty] - 1;
   } else {
     unset($_SESSION["cart"][$id]);
   }
 }
}

//Adding a new item

if ( isset($_GET["add"]) ) {
  $id = $_GET["add"];

  if (isset($_SESSION["cart"][$id][$qty])) {
    $_SESSION["cart"][$id][$qty] = $_SESSION["cart"][$id][$qty] + 1;
  } else {
    $_SESSION["cart"][$id][$qty] = 1;
  }
}



 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Cart</title>
   </head>
   <body>

     <table class="table">
       <thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Name</th>
           <th scope="col">Price</th>
           <th scope="col">Quantity</th>
         </tr>
       </thead>
       <tbody>
         <?php
          if ( isset($_SESSION["cart"]) ) {
            foreach($_SESSION["cart"] as $item){
              echo "<tr>
                <th scope='row'>{$item->id}</th>
                <td>{$items[$id][$name]}</td>
                <td></td>
                <td></td>
              </tr>";
            }
          }

          ?>
        </tbody>
      </table>



   </body>
 </html>
