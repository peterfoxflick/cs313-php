<!DOCTYPE html>
<html>
<head>
	<title>Peter Flick</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Personal Styles -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>
<body onload="toggleDesc()" >

<div class="super-container">
  <div class="container">
			<div class="row">
        <div class="col-sm-6">
          <div class="center-all">
            <img src="media/bigHead.jpeg" class="avitar img-fluid">
            <h1>Peter Flickinger</h1>
            <p class="lead">A bit about me</h1>
          </div>
        </div>
        <div class="col-sm-6 vertical-center-sm ">
          <div class="list-group list-group-flush inherit-width lead">
            <button onclick="toggleDesc()" class="list-group-item list-group-item-action">About Me</button>
              <p id="toggleDes">I'm currently a computer science major. My interests include web development, videography, learning new things, and snorkling</p>
            <a href="./assignments.php" class="list-group-item list-group-item-action">Assignments</a>
          </div>
        </div>
      </div>
	</div>
</div>




<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Personal Script -->
<!-- <script type="text/javascript" src="script.js"></script> -->
<script>
  function toggleDesc(){
		var x = document.getElementById("toggleDes");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
  }



</script>
</body>
</html>
