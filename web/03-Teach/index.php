<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Week 03 Teach</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-3 text-center">PHP Form Submission</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
        <form action="system.php" method="post">
        <div class="form-group">
          <label for="nameInput">Name</label>
          <input type="text" class="form-control" id="nameInput" name="name"><br>
        </div>
        <div class="form-group">
          <label for="emailInput">Email</label>
          <input type="text" class="form-control" id="emailInput" name="email"><br>
        </div>

        <div class="form-group">
          <?php
          $major = array("Computer Science"=>"CS", "Web Design and Development"=>"WDD",
                         "Computer Information Technology"=>"CIT", "Computer Engineering"=>"CE");

          foreach($major as $name => $abbr) {
              echo "<div class='form-check'>
                     <input type='radio' name='major' id='major-{$abbr}' class='form-check-input' value='{$name}'>
                     <label for='major-{$abbr}' class='form-check-label'>$name</label>
                    </div>";
          }
                          ?>
          <!-- <div class="form-check">
            <input type="radio" name="major" id="major-cs" class="form-check-input" value="Computer Science">
            <label for="major-cs" class="form-check-label">Computer Science</label>
          </div>
          <div class="form-check">
            <input type="radio" name="major" id="major-web" class="form-check-input" value="Web Design and Development">
            <label for="major-web" class="form-check-label">Web Design and Development</label>
          </div>
          <div class="form-check">
            <input type="radio" name="major" id="major-cit" class="form-check-input" value="Computer Information Technology">
            <label for="major-cit" class="form-check-label">Computer Information Technology</label>
          </div>
          <div class="form-check">
            <input type="radio" name="major" id="major-ce" class="form-check-input" value="Computer Engineering">
            <label for="major-ce" class="form-check-label">Computer Engineering</label>
           </div> -->
        </div>


        <div class="form-group">
          <div class="form-check">
            <input type="checkbox" name="continent[]" id="continent-NA" class="form-check-input" value="NA">
            <label for="continent-NA" class="form-check-label">North America</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="continent[]" id="continent-SA" class="form-check-input" value="SA">
            <label for="continent-SA" class="form-check-label">South America</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="continent[]" id="continent-Eu" class="form-check-input" value="EU">
            <label for="continent-Eu" class="form-check-label">Europe</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="continent[]" id="continent-As" class="form-check-input" value="AS">
            <label for="continent-As" class="form-check-label">Asia</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="continent[]" id="continent-Au" class="form-check-input" value="AU">
            <label for="continent-Au" class="form-check-label">Australia</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="continent[]" id="continent-Af" class="form-check-input" value="AF">
            <label for="continent-Af" class="form-check-label">Africa</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="continent[]" id="continent-An" class="form-check-input" value="AN">
            <label for="continent-An" class="form-check-label">Antartica</label>
          </div>
        </div>


          <div class="form-group">
            <label for="comments">Comments</label>
            <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
          </div>

        <input type="submit" class="btn btn-primary">
      </form>
    </div>
    </div>
  </div>
  </body>
</html>




<!-- Change your HTML form to also be PHP script. For the majors, instead of hardcoding each of the options,
 instead, create a PHP array (or something similar...) that contains each of the desired majors and its
 abbreviation. Then, loop over this array to generate radio buttons for the different majors. -->
 <!--

  -->
