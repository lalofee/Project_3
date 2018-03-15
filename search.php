<?php 
session_start();
 
require_once 'actions/dbconnect.php';

//select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userid=".$_SESSION['user']);

 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- custom google font -->
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Noto+Sans" rel="stylesheet">
  </head>
    <title>Recipe 4 Me</title>
  </head>
  <body>
    
<!-- #####################    FIXED NAVBAR     ############################ -->
    <nav class="navbar navbar-custom navbar-expand-md fixed-top">
      <a class="navbar-brand" href="index.php" id="brand_text">Recipe 4 Me</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="search.php">Search<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upload.php">New Recipe</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="nav-item"><span class="nav-link">Welcome - <?php echo $userRow['username']; ?></span></li>
          <li class="nav-item"><a class="nav-link" href="logout.php?logout">Sign Out</a></li>
        </ul>
      </div>
    </nav>

  
    


<main role="main" class="container">  <!-- MAIN CONTAINER  -->

  <!-- #####################    JUMBOTRON HEADER     ############################ -->
<div class='container-full-bg' style='background-image:url(img/header.jpg);'>
    <div class='container special'>
      <div class='jumbotron' id='jumbotron-bg-image'>
        <div class='container'>
          <div class='row'>
            <div class='col-s-12 col-md-12' id='bg_text'>
              <h1 class='display-3 text-center' id='brand_text'>Filter your Recipes</h1>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row mx-auto rounded mt-5 p-5" id="bg_filter">

<div class="col-lg-4">
 <div class="ml-5">
<div class="input-group">
   <div class="input-group-prepend">
    <label class=""><input type="checkbox" name="my_recipes" aria-label="checkbox button for following text input"></label>
   </div>
   <fieldset type="text" class="form-check" aria-label="Text input with checkbox button"> - my recipes - </fieldset>
  </div>

<!-- <form action="filter_try.php" method="post"> -->
  <div class="input-group mt-2">
   <div class="input-group-prepend">
    <label>
      <input type="hidden" name="categories[]" value="main-meal" aria-label="checkbox button for following text input">
    <input type="checkbox" name="main_meal" aria-label="checkbox button for following text input">
    </label>
   </div>
   <fieldset type="text" class="form-check" aria-label="Text input with checkbox button"> - main-meal - </fieldset>
  </div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" name="categories[]" value="starter" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" aria-label="Text input with checkbox button"> - starter - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" name="categories[]" value="breakfast" -label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" aria-label="Text input with checkbox button"> - breakfast - </fieldset>
</div>
<!-- <input type="submit" name="submit" value="submit">
<?php include 'checkbox_value.php';?>
</form> -->

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="snack" aria-label="Text input with checkbox button"> - snack - </fieldset>
</div>
<br>
</div>
</div>

<div class="col-lg-4">
<div class="ml-5">
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="sugar-free" aria-label="Text input with checkbox button"> - sugar-free - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="egg-free" aria-label="Text input with checkbox button"> - egg-free - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="vegan" aria-label="Text input with checkbox button"> - vegan - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="vegetarian" aria-label="Text input with checkbox button"> - vegetarian - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="lactose-free" aria-label="Text input with checkbox button"> - lactose-free - </fieldset>
</div>

</div>
</div>
<div class="col-lg-4">
<div class="ml-5">
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="low-carb" aria-label="Text input with checkbox button"> - low-carb - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="dairy-free" aria-label="Text input with checkbox button"> - dairy-free - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="nut-free" aria-label="Text input with checkbox button"> - nut-free - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="drinks" aria-label="Text input with checkbox button"> - drinks - </fieldset>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="shakes" aria-label="Text input with checkbox button"> - shakes-smoothies - </fieldset>
</div> 

</div>
</div> 
<br>
  
</div>
<br>
<br>
<center>
    <a href="recipe.php"><button type="submit" class="btn btn-outline-success btn-block" style="width: 55%">Find your selected recipes</button></a>
</center>


<?php
// $my_recipes="";
$main_meal="";
$starter="";
$breakfast="";


if($_GET){
// $my_recipes = $_GET['my_recipes'];
$main_meal = $_GET['main_meal'];
$starter = $_GET['starter'];
$breakfast = $_GET['breakfast'];

}
echo "<p>" .$main_meal.$starter.$breakfast. "</p>"


?>

<footer class="footer">
      <div class="container text-center mt-5 mb-4">
        <span class="text-muted font-weight-bold">created by   <a href="https://github.com/sabkiha"><i class="fa fa-github"> Sabine</i></a></span>
                                           <a href=""></a><i class="fa fa-github"> Nina</i></span>
                                           <a href="https://github.com/tpatkos"><i class="fa fa-github"> Theo</i></a></span>
                                           <a href="https://github.com/lalofee"><i class="fa fa-github"> Angela</i></a></span>
      </div>
    </footer>

</main>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>