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
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php?logout">Sign Out</a></li>
        </ul>
      </div>
    </nav>

  
    


<main role="main" class="container">  <!-- MAIN CONTAINER  -->

  <!-- #####################    JUMBOTRON HEADER     ############################ -->
     <!--  <div class="jumbotron" style="background-image:url('img/fruits.jpg'); opacity: 0.7">
          <h1 class="display-5 text-center">Filter and select recipes</h1>
    </div> -->
      <div class="container-full-bg" style="background-image:url('img/fruits.jpg');">
        <div class="container special" >
          <div class="jumbotron" id="jumbotron-filter">
            
              <h1 class="white">Filter and select recipes</h1>
           
          </div>
        </div>
      </div>
<br>
<br>

<div class="row mx-auto">

<div class="col-lg-4">
 <div class="ml-5">
<div class="input-group">
   <div class="input-group-prepend">
    <label class=""><input type="checkbox" name="my_recipes" aria-label="checkbox button for following text input"></label>
   </div>
   <fieldset type="text" class="form-check" aria-label="Text input with checkbox button"> - my recipes - </fieldset>
  </div>
<br>
<!-- <form action="filter_try.php" method="post"> -->
  <div class="input-group">
   <div class="input-group-prepend">
    <label>
      <input type="hidden" name="categories[]" value="main-meal" aria-label="checkbox button for following text input">
    <input type="checkbox" name="main_meal" aria-label="checkbox button for following text input">
    </label>
   </div>
   <fieldset type="text" class="form-check" aria-label="Text input with checkbox button"> - main-meal - </fieldset>
  </div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" name="categories[]" value="starter" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" aria-label="Text input with checkbox button"> - starter - </fieldset>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" name="categories[]" value="breakfast" -label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" aria-label="Text input with checkbox button"> - breakfast - </fieldset>
</div>
<!-- <input type="submit" name="submit" value="submit">
<?php include 'checkbox_value.php';?>
</form> -->
<br>
<div class="input-group">
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
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="egg-free" aria-label="Text input with checkbox button"> - egg-free - </fieldset>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="vegan" aria-label="Text input with checkbox button"> - vegan - </fieldset>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="vegetarian" aria-label="Text input with checkbox button"> - vegetarian - </fieldset>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="lactose-free" aria-label="Text input with checkbox button"> - lactose-free - </fieldset>
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
  <fieldset type="text" class="form-check" name="categories" value="low-carb" aria-label="Text input with checkbox button"> - low-carb - </fieldset>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="dairy-free" aria-label="Text input with checkbox button"> - dairy-free - </fieldset>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="nut-free" aria-label="Text input with checkbox button"> - nut-free - </fieldset>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="drinks" aria-label="Text input with checkbox button"> - drinks - </fieldset>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <label><input type="checkbox" aria-label="checkbox button for following text input"></label>
  </div>
  <fieldset type="text" class="form-check" name="categories" value="shakes" aria-label="Text input with checkbox button"> - shakes-smoothies - </fieldset>
</div> 
<br>
</div>
</div> 
<br>
  
</div>
<br>
<br>
<center>
    <button type="submit" class="btn btn-outline-success btn-block" style="width: 55%">Find your selected recipes</button>
</center>
<br>

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
</main>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>