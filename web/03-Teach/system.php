<?php
/* Here we are goin to write our php code.*/
$formData['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$formData['email'] = filter_input(INPUT_POST, 'email');
$formData['email'] = checkEmail($formData['email']);
$formData['major'] = filter_input(INPUT_POST, 'major', FILTER_SANITIZE_STRING);
$formData['comments'] = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
$formData['continent'] =$_POST['continent'];

function checkEmail($email){
  $sanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
  $valEmail = filter_var($sanEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display</title>
  </head>
  <body>
    <h1>Name: <?= $formData['name'] ?></h1>
    <p>Email: <?= $formData['email'] ?></p>
    <p>Major: <?= $formData['major'] ?></p>
    <p><strong>Comments:</strong></p>
    <p><?= $formData['comments'] ?></p>
    <p><strong>Continent</strong></p>
    <p><?= json_encode($formData['continent']) ?></p>
  </body>
</html>


<!-- Create a PHP script to handle this form, so that when the form is submitted, it captures the form data and produces a web page that displays:

The user's name

Their email address, with a "mailto:" link for the email address

Their major

Their comments

Again, this data need not be styled, but it should be labeled and separated from each other.

Use the POST method for your form submission. -->
