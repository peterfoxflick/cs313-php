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
    public $quantity;
}

$newItem = new Item();
  $newItem->id = 'C001';
  $newItem->name = 'Telephoto Camera';
  $newItem->desc = 'This camera is perfect for getting far away shots.';
  $newItem->price = 499.99;

$items['C001'] = $newItem;

$newItem1 = new Item();
  $newItem1->id = 'C002';
  $newItem1->name = 'Pocket Camera';
  $newItem1->desc = 'This camera is great and portable';
  $newItem1->price = 299.99;

$items['C002'] = $newItem1;



$newItem2 = new Item();
  $newItem2->id = 'C003';
  $newItem2->name = 'Vintage Camera';
  $newItem2->desc = 'Throw back to this camera flashback.';
  $newItem2->price = 399.99;

$items['C003'] = $newItem2;

$newItem3 = new Item();
  $newItem3->id = 'C004';
  $newItem3->name = 'Vintage Cool Camera';
  $newItem3->desc = 'Throw back to this cool camera flashback.';
  $newItem3->price = 399.99;

$items['C004'] = $newItem3;


//Adding a new item

if ( !isset($_SESSION["cart"])) {
  $_SESSION["cart"] = array();
}


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
  <div class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col">

        <a href='cart.php' class='btn btn-primary'>Cart</a>

        <?php

        foreach ($items as $item) {
          echo "<div class='card' style='width: 300px;margin:15px'>
          <div class='card-body'>
          <h5 class='card-title'>{$item->name}</h5>
          <p class='card-text'>{$item->desc}</p>
          <a href='?add={$item->id}' class='btn btn-primary'>Add to Cart</a>
          </div>
          </div>";
        }


        ?>
      </div>
    </div>
  </div>
</body>
</html>

<!--
On the browse items page, the user sees a list of items they can add to their cart and purchase. Again, the kind of items and the formatting of this page is up to you.

You should provide a button or link to add an item to the cart. Doing so should store that item in some way to the session, and then keep the user on the browse page. -->
