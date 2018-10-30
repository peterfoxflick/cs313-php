<?php
session_start();
// SQL
/******************************************************************

CREATE TABLE "user" (
    id         SERIAL                 NOT NULL,
    user_name  VARCHAR(24)            NOT NULL,
    password   TEXT                   NOT NULL,
    PRIMARY KEY( id )
 );


Sign up page
  Create a sign-up page that asks for a username and password, and then inserts this into the database.

  Make sure that you do not insert the password directly into the database, use the password_hash() function to generate a hash of it, and insert that into the database.

  After inserting the user, redirect to the sign-in page.


sign-in page
  If a correct username/password is entered, save the user id to the session and redirect to the welcome page.

  If an incorrect username/password is entered, stay on this page.

  Make sure to use the password_verify() function and compare against the hash in your database.

  This page should have a link to the sign-up page.


Welcome page
  If a user is found, the welcome page should display, "Welcome [username]" (where [username] is the current user's username.)

  If no user is logged in, the welcome page should automatically redirect to the sign-in page.

 *****************************************************************/




 ?>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
    <style media="screen">
      body{
        background-color: #A8A8A8;
        font-family: 'Roboto', sans-serif;
      }

      .container{
        /*border:1px solid white;*/
        width: 600px;
        height: 350px;
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%);
        display: inline-flex;
      }
      .backbox{
        background-color: #404040;
        width: 100%;
        height: 80%;
        position: absolute;
        transform: translate(0,-50%);
        top:50%;
        display: inline-flex;
      }

      .frontbox{
        background-color: white;
        border-radius: 20px;
        height: 100%;
        width: 50%;
        z-index: 10;
        position: absolute;
        right:0;
        margin-right: 3%;
        margin-left: 3%;
        transition: right .8s ease-in-out;
      }

      .moving{
        right:45%;
      }

      .loginMsg, .signupMsg{
        width: 50%;
        height: 100%;
        font-size: 15px;
        box-sizing: border-box;
      }

      .loginMsg .title,
      .signupMsg .title{
        font-weight: 300;
        font-size: 23px;
      }

      .loginMsg p,
      .signupMsg p {
        font-weight: 100;
      }

      .textcontent{
        color:white;
        margin-top:65px;
        margin-left: 12%;
      }

      .loginMsg button,
      .signupMsg button {
        background-color: #404040;
        border: 2px solid white;
        border-radius: 10px;
        color:white;
        font-size: 12px;
        box-sizing: content-box;
        font-weight: 300;
        padding:10px;
        margin-top: 20px;
      }

      /* front box content*/
      .login, .signup{
        padding: 20px;
        text-align: center;
      }

      .login h2,
      .signup h2 {
        color: #35B729;
        font-size:22px;
      }

      .inputbox{
        margin-top:30px;
      }
      .login input,
      .signup input {
        display: block;
        width: 100%;
        height: 40px;
        background-color: #f2f2f2;
        border: none;
        margin-bottom:20px;
        font-size: 12px;
      }

      .login .button,
      .signup .button{
        background-color: #35B729;
        border: none;
        color:white;
        font-size: 12px;
        font-weight: 300;
        box-sizing: content-box;
        border-radius: 10px;
        width: 60px;
        position: absolute;
        right:30px;
        cursor: pointer;
      }

      /* Fade In & Out*/
      .login p {
        cursor: pointer;
        color:#404040;
        font-size:15px;
      }

      .loginMsg, .signupMsg{
        /*opacity: 1;*/
        transition: opacity .8s ease-in-out;
      }

      .visibility{
        opacity: 0;
      }

      .hide{
        display: none;
      }
    </style>
</head>
<body>

  <div class="container">
    <div class="backbox">
      <div class="loginMsg">
        <div class="textcontent">
          <p class="title">Don't have an account?</p>
          <p>Sign up to save yourself.</p>
          <button id="switch1">Sign Up</button>
        </div>
      </div>
      <div class="signupMsg visibility">
        <div class="textcontent">
          <p class="title">Have an account?</p>
          <p>Log in to see a boring screen.</p>
          <button id="switch2">LOG IN</button>
        </div>
      </div>
    </div>
    <!-- backbox -->
    <form method="post" action="authentication.php">
    <div class="frontbox">
      <div class="login">
        <h2>LOG IN</h2>
        <div class="inputbox">
          <input type="text" name="user_name" placeholder="USERNAME">
          <input type="password" name="password" placeholder="PASSWORD">
        </div>
        <p>FORGET PASSWORD?</p>
        <input class="button" type="submit" value="LOG IN">
      </div>
      </form>

      <form method="post" action="signup.php">
      <div class="signup hide">
        <h2>SIGN UP</h2>
        <div class="inputbox">
          <input type="text" name="username" placeholder="username">
          <input type="password" name="password" placeholder="PASSWORD">
        </div>
        <input class="button" type="submit" value="SIGN UP">
      </div>
      </form>

    </div>
    <!-- frontbox -->
  </div>
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
      var $loginMsg = $('.loginMsg'),
        $login = $('.login'),
        $signupMsg = $('.signupMsg'),
        $signup = $('.signup'),
        $frontbox = $('.frontbox');

      $('#switch1').on('click', function() {
        $loginMsg.toggleClass("visibility");
        $frontbox.addClass("moving");
        $signupMsg.toggleClass("visibility");

        $signup.toggleClass('hide');
        $login.toggleClass('hide');
      })

      $('#switch2').on('click', function() {
        $loginMsg.toggleClass("visibility");
        $frontbox.removeClass("moving");
        $signupMsg.toggleClass("visibility");

        $signup.toggleClass('hide');
        $login.toggleClass('hide');
      });
    </script>

</html>
