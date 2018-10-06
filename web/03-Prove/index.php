<?php
// The Session
session_start();



// The products to sell
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



//Adding a new item

if ( isset($_GET["add"]) ) {
  $id = $_GET["add"];

  if (isset($_SESSION["cart"][$id][$qty])) {
    $_SESSION["cart"][$id][$qty] = $_SESSION["cart"][$id][$qty] + 1;
  } else {
    $_SESSION["cart"][$id][$qty] = 1;
  }
}



//Reset
if ( isset($_GET['reset']) ) {
  if ($_GET["reset"] == 'true') {
    unset($_SESSION["cart"]);
    }
}











?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
    <?php

    foreach ($items as $item) {
        echo "<div class='card' style='width: 18rem;'>
          <div class='card-body'>
            <h5 class='card-title'>{$item->name}</h5>
            <p class='card-text'>{$item->desc}</p>
            <a href='?add={$item->id}' class='btn btn-primary'>Add to Cart</a>
          </div>
        </div>";
    }


     ?>




  </body>
</html>

<!--
On the browse items page, the user sees a list of items they can add to their cart and purchase. Again, the kind of items and the formatting of this page is up to you.

You should provide a button or link to add an item to the cart. Doing so should store that item in some way to the session, and then keep the user on the browse page. -->
