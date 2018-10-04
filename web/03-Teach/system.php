<?php

$continentLookup= array(
    "NA" => "North America",
    "SA" => "South America",
    "EU" => "Europe",
    "AS" => "Asia",
    "AU" => "Australia",
    "AF" => "Africa",
    "AN" => "Antartica"
);

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

/* Here we are goin to write our php code.*/
$formData['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$formData['email'] = filter_input(INPUT_POST, 'email');
$formData['email'] = checkEmail($formData['email']);
$formData['major'] = filter_input(INPUT_POST, 'major', FILTER_SANITIZE_STRING);
$formData['comments'] = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
$formData['continents'] = $_POST['continent'];

foreach($formData['continents'] as $key) {
  array_push($formData['continent'], $continentLookup[$key]);
  debug_to_console( $formData['continent'] );
}




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
    <title>Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <h1>Name: <?= $formData['name'] ?></h1>
          <p>Email: <?= $formData['email'] ?></p>
          <p>Major: <?= $formData['major'] ?></p>
          <p><strong>Comments:</strong></p>
          <p><?= $formData['comments'] ?></p>
          <p><strong>Continent</strong></p>
          <p><?= $formData['continent'] ?></p>
        </div>
      </div>
    </div>

  </body>
</html>


<!-- Create a PHP script to handle this form, so that when the form is submitted, it captures the form data and produces a web page that displays:

The user's name

Their email address, with a "mailto:" link for the email address

Their major

Their comments

Again, this data need not be styled, but it should be labeled and separated from each other.

Use the POST method for your form submission. -->
