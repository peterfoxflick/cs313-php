<?php
session_start();

//Removing a new item
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



 ?>
