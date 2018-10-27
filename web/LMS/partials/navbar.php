<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="https://mysterious-sands-95461.herokuapp.com/LMS/index.php">LMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="https://mysterious-sands-95461.herokuapp.com/LMS/index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./user.php?id=2" role="button">My Progress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./addContent.php?id=2" role="button">Add a Page</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" id="searchTerm" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" onclick="searchBtn()">Search</button>
    </div>
  </div>
</nav>
