<?php 
session_start();
 
require_once 'actions/dbconnect.php';

// select logged-in users detail
 // $res=mysqli_query($conn, "SELECT * FROM users WHERE userid=".$_SESSION['user']);

 // $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

// Welcome - <?php echo $userRow['userName'];
?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- custom google font -->
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Noto+Sans" rel="stylesheet">
    <title>Recipe Me</title>
  </head>
    

  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    
<!-- #####################    FIXED NAVBAR     ############################ -->
    <nav class="navbar navbar-custom navbar-expand-md fixed-top">
      <a class="navbar-brand" href="index.php" id="brand_text">Recipe 4 Me</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="search.php">Search</a>
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
 <?php
    $sql = "SELECT `images`.`image`, `recipe`.`name`, `recipe`.`cookingMethod`, `recipe`.`instructions`, `recipe`.`idRecipe`
FROM `recipe`
    LEFT JOIN `images` ON `recipe`.`fk_idImage` = `images`.`idImage`
WHERE (`recipe`.`idRecipe` = 2)
";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
      
      
     
  <div class='container-full-bg' style='background-image:url(img/" . $row['image'] . ");'>
    <div class='container special'>
      <div class='jumbotron' id='jumbotron-bg-image'>
        <div class='container'>
          <div class='row'>
            <div class='col-s-12 col-md-12' id='bg_text'>
          <h1 class='display-3 text-center' id='brand_text'>".$row['name']."</h1>
          ";
    }
    } else {
    echo "<p>No Data Avaliable</p>";
}
?>     
          </div>
          </div>
      </div>
    </div>
  </div>
</div>
 
<!-- #####################    2nd NAVIGATION     ############################ -->
  <div>
      <ul class="nav nav-pills red flex-column flex-sm-row justify-content-center nav-fill mt-3">
    <li class="nav-item pill-1">
      <a class="nav-link active" href="#section1">Recipe</a>
    </li>
    <li class="nav-item pill-2">
      <a class="nav-link" href="#section2">Ingredients</a>
    </li>
    <li class="nav-item pill-3">
      <a class="nav-link" href="#section3">Comments</a>
    </li>
    </ul>
  </div>
 
<div><hr class="style5"></div>

 <!-- #####################    Category     ############################ -->
  <div class="col-s-12 col-md-12 mt-5 pl-0" id="section1">
    <h3>Recipe</h3>
    <?php
    $sql = "SELECT `recipe`.`name`, `tags`.`category`
FROM `recipe`
    LEFT JOIN `recipe_tags` ON `recipe_tags`.`fk_idRecipe` = `recipe`.`idRecipe`
    LEFT JOIN `tags` ON `recipe_tags`.`fk_idTag` = `tags`.`idTag`
WHERE (`recipe`.`idRecipe` = 2 )
";
        $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <span>  ".$row['category']." |</span>
     ";
    }
    } else {
    echo "<p>No Data Avaliable</p>";
}
?>
  </div>
 
<!-- #####################    RECIPE     ############################ -->
<div class="row" id="summary">
  <div class="col-s-12 col-md-12 mt-3 mb-5">
    
<?php
    $sql = "SELECT `images`.`image`, `recipe`.`name`, `recipe`.`cookingMethod`, `recipe`.`instructions`, `recipe`.`idRecipe`
FROM `recipe`
    LEFT JOIN `images` ON `recipe`.`fk_idImage` = `images`.`idImage`
WHERE (`recipe`.`idRecipe` = 2)
";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
      
      <p class='text-uppercase font-weight-bold'>".$row['name']."</p>
      <p>".$row['cookingMethod']."</p>
      <p>".$row['instructions']."</p>
     ";
    }
    } else {
    echo "<p>No Data Avaliable</p>";
}
?>     
  </div> 
 
<!-- #####################    Ingredients     ############################ -->
  <div class="col-s-12 col-md-12 mb-5" id="section2">
    <h3>List of Ingredients</h3>
    <?php
    $sql = "SELECT `amount_ingredients`.`amount`, `units`.`unit_EN`, `ingredient`.`ingredient`, `recipe`.`idRecipe`
FROM `recipe`
    LEFT JOIN `amount_ingredients` ON `amount_ingredients`.`fk_idRecipe` = `recipe`.`idRecipe`
    LEFT JOIN `units` ON `amount_ingredients`.`fk_idUnits` = `units`.`idUnits`
    LEFT JOIN `ingredient` ON `amount_ingredients`.`fk_idIngredients` = `ingredient`.`idIngredient`
WHERE (`recipe`.`idRecipe` = 2)
";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "    
      <ul class='list-group'>
      <li class='list-group-item'> ".$row['amount']."  ".$row['unit_EN']."  ".$row['ingredient']."</li>
      </ul>
     ";
    }
    } else {
    echo "<p>No Data Avaliable</p>";
}
?>     
  </div>
  <!-- #####################    Comments     ############################ -->
  <div class="col-s-12 col-md-12" id="section3">
    <h3>Comments</h3>
        <?php
    $sql = "SELECT `recipe`.`idRecipe`, `comments`.`comment`, `comments`.`timestamp`
FROM `recipe`
    LEFT JOIN `comments` ON `comments`.`fk_idRecipe` = `recipe`.`idRecipe`
WHERE (`recipe`.`idRecipe` =2)
";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
      <p>Comments on this recipe</p>
      <p>".$row['comment']."</p>
      <p>".$row['timestamp']."</p>
     ";
    }
    } else {
    echo "<p>No Data Avaliable</p>";
}
?>     
  </div>
</div>

<!-- #######################  COMMENT SECTION  ####################### -->
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-12 comments-main pt-4 rounded">
        <ul class="p-0">
          <li>
            <div class="row comments mb-2">
              <div class="col-md-2 col-sm-2 col-3 text-center user-img">
                  <img id="profile-photo" src="demo/man01.png" class="rounded-circle" />
              </div>
              <div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
                <h4 class="m-0"><a href="#">Jacks David</a></h4>
                  <time class="text-white ml-3">1 hours ago</time>
                  <like></like>
                  <p class="mb-0 text-white">Thank you for this great recipe.</p>
              </div>
            </div>
          </li>
          <ul class="p-0">
            <li>
              <div class="row comments mb-2">
                <div class="col-md-2 offset-md-2 col-sm-2 offset-sm-2 col-3 offset-1 text-center user-img">
                    <img id="profile-photo" src="demo/man02.png" class="rounded-circle" />
                </div>
                <div class="col-md-7 col-sm-7 col-8 comment rounded mb-2">
                  <h4 class="m-0"><a href="#">Steve Alex</a></h4>
                    <time class="text-white ml-3">1 week ago</time>
                    <like></like>
                    <p class="mb-0 text-white">Thank you for this great recipe.</p>
                </div>
              </div>
            </li>
          </ul>
        </ul>
        <ul class="p-0">
          <li>
            <div class="row comments mb-2">
              <div class="col-md-2 col-sm-2 col-3 text-center user-img">
                  <img id="profile-photo" src="demo/man03.png" class="rounded-circle" />
              </div>
              <div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
                <h4 class="m-0"><a href="#">Andrew Filander</a></h4>
                  <time class="text-white ml-3">7 day ago</time>
                  <like></like>
                  <p class="mb-0 text-white">Thank you for this great recipe..</p>
              </div>
            </div>
          </li>
          <ul class="p-0">
            <li>
              <div class="row comments mb-2">
                <div class="col-md-2 offset-md-2 col-sm-2 offset-sm-2 col-3 offset-1 text-center user-img">
                    <img id="profile-photo" src="demo/man04.png" class="rounded-circle" />
                </div>
                <div class="col-md-7 col-sm-7 col-8 comment rounded mb-2">
                  <h4 class="m-0"><a href="#">james Cordon</a></h4>
                    <time class="text-white ml-3">1 min ago</time>
                    <like></like>
                    <p class="mb-0 text-white">Thank you for this great recipe..</p>
                </div>
              </div>
            </li>
          </ul>
        </ul>
        <ul class="p-0">
          <li>
            <div class="row comments mb-2">
              <div class="col-md-2 col-sm-2 col-3 text-center user-img">
                  <img id="profile-photo" src="demo/man01.png" class="rounded-circle" />
              </div>
              <div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
                <h4 class="m-0"><a href="#">Tye Simmon</a></h4>
                  <time class="text-white ml-3">1 month ago</time>
                  <like></like>
                  <p class="mb-0 text-white">Thank you for this great recipe.</p>
              </div>
            </div>
          </li>
        </ul>
        <div class="row comment-box-main p-3 rounded-bottom">
            <div class="col-md-9 col-sm-9 col-9 pr-0 comment-box">
            <input type="text" class="form-control" placeholder="comment ...." />
            </div>
            <div class="col-md-3 col-sm-2 col-2 pl-0 text-center send-btn">
              <button class="btn btn-info">Send</button>
            </div>
        </div>
      </div>
    </div>
  </div>
  </body>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.14/vue.min.js'></script>
  <script>
  Vue.component('like', {
      template: "<div class='like-data float-right text-white'><button class='icon-rocknroll mr-1 p-0 border-0' v-class='active: liked' v-on='click: toggleLike'><i class='fa fa-thumbs-up text-white' aria-hidden='true'></i></button><span class='like-count' v-class='active: liked'>{{ likesCount }}</span></div>",
      data: function() {
          return {
              liked: false,
              likesCount: 0
          }
      },
      methods: {
          toggleLike: function() {
              this.liked = !this.liked;
              this.liked ? this.likesCount++ : this.likesCount--;
          }
      }
  });
  new Vue({
      el: '.comments-main',
  });
  </script>


<!-- scroll to top button  -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  <div style="background-color:#5DDDD3;color:white;padding:30px; border-bottom: 3px solid #43C3B9; position: fixed; width: 100%; top: 0px;">
  

<script>

  window.onscroll = function() {scrollFunction()};
  function scrollFunction(){
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
          document.getElementById("myBtn").style.display = "block";
      } else {
          document.getElementById("myBtn").style.display = "none";
      }
  }
  function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
  }
</script>
<!-- endof scroll to top button -->
 
</main>
<footer class="footer">
      <div class="container text-center">
        <span class="text-muted font-weight-bold">created by   <a href="https://github.com/sabkiha"><i class="fa fa-github"> Sabine</i></a></span>
                                           <a href=""></a><i class="fa fa-github"> Nina</i></span>
                                           <a href="https://github.com/tpatkos"><i class="fa fa-github"> Theo</i></a></span>
                                           <a href="https://github.com/lalofee"><i class="fa fa-github"> Angela</i></a></span>
      </div>
    </footer>
 
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
