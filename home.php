<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css">
    <title>Recipe Me</title>
  </head>
  <body>
    
<!-- #####################    FIXED NAVBAR     ############################ -->
    <nav class="navbar navbar-custom navbar-expand-md fixed-top">
      <a class="navbar-brand" href="index.php">Recipe Me</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="filter.php">Filter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php">Search</a>
          </li>
        </ul>
      </div>
    </nav>

<main role="main" class="container">  <!-- MAIN CONTAINER  -->
 
 <!-- #####################    JUMBOTRON HEADER     ############################ -->
  <div class="container-full-bg" style="background-image:url('img/header.jpg');">
    <div class="container special">
      <div class="jumbotron" id="jumbotron-bg-image">
        <div class="container">
          <h1 class="white">Asian Noodlebowl</h1>
      </div>
    </div>
  </div>
</div>

<!-- #####################    2nd NAVIGATION     ############################ -->
  <div>
      <ul class="nav nav-pills red flex-column flex-sm-row justify-content-center nav-fill mt-3">
    <li class="nav-item pill-1">
      <a class="nav-link active" href="#">Summery</a>
    </li>
    <li class="nav-item pill-2">
      <a class="nav-link" href="#">Ingredients</a>
    </li>
    <li class="nav-item pill-3">
      <a class="nav-link" href="#">Recipe</a>
    </li>
    </ul>
  </div>


<!-- #####################    SUMMARY     ############################ -->
<div class="row" id="summary">
  <div class="col-s-12 col-md-12 mt-5">
  <h3>Preperation Time:</h3>
  <h3>Cooking Time:</h3>
  <h4>Inhalte:</h4>
  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
  </div>
</div>

<div><hr class="style5 my-5"></div>

<!-- #####################    INGREDIENTS     ############################ -->
<div class="row" id="ingredients">
  <div class="col-s-12 col-md-12">
    <h3>Ingredients:</h3>
       <ul class="list-group">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
        </ul>
  </div>
</div>

<div><hr class="style5 my-5"></div>

<!-- #####################    RECIPE     ############################ -->
<div class="row" id="recipe">
  <div class="col-s-12 col-md-12 mt-6 mb-6">
    <h3>Recipe:</h3>
  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
  </div> 
</div>


</main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>