<?php
 ob_start();
 session_start();
 require_once 'actions/dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: search.php");
  exit;
 }
 
 $error = false;


 // --------------------PHP für LOGIN----------------------------------  //
 
 if( isset($_POST['btn-login']) ) {
 
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
 
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
 
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
 
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
 
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
 
   $res=mysqli_query($conn, "SELECT userid, username, userlastname, userpass FROM users WHERE useremail='$email'");
   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userpass']==$password ) {
    $_SESSION['user'] = $row['userid'];
    header("Location: search.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
}
 }

 // --------------------PHP für REGISTRATION----------------------------------  //

    $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
    $lastname = trim($_POST['lastname']);
  $lastname = strip_tags($lastname);
  $lastname = htmlspecialchars($lastname);
 
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
 
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
 
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your first name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  if (empty($lastname)) {
   $error = true;
   $lastnameError = "Please enter your last name.";
  } else if (strlen($lastname) < 3) {
   $error = true;
   $lastnameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
   $error = true;
   $lastnameError = "Name must contain alphabets and space.";
  }
 
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check whether the email exist or not
   $query = "SELECT useremail FROM users WHERE useremail='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
 
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
 
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(username,userlastname, useremail,userpass) VALUES('$name','$lastname','$email','$password')";
   $res = mysqli_query($conn, $query);
   
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($lastname);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }  
  }

?>
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
    <link rel="stylesheet" href="css/animate.css">
    <!-- custom google font -->
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Noto+Sans" rel="stylesheet">
  </head>
    <title>Recipe 4 Me</title>
  </head>
<body id="index_body">


<!-- #####################    FIXED NAVBAR     ############################ -->
<nav class="navbar navbar-custom navbar-expand-md fixed-top">
  <a class="navbar-brand" href="index.php" id="brand_text">Recipe 4 Me</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
  </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="search.php">search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upload.php">new recipe</a>
          </li> -->
        </ul>

<!-- LOGIN and REGISTER  -->
<ul class="nav navbar-nav navbar-right">
  <li class="dropdown">
  <a href="" class="dropdown-toggle" data-toggle="dropdown">Register <span class="caret"></span></a>
    <ul class="dropdown-menu dropdown-lr animated flipInX" role="menu">
      <div class="col-lg-12">
        <div class="text-center"><h3><b>Register</b></h3></div>
          <form id="ajax-register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" role="form" autocomplete="off">
            <?php
              if ( isset($errMSG) ) {
            ?>
              <div class="alert">
                <?php echo $errMSG; ?>
              </div>
                <?php
                  }
                ?>
                <div class="form-group">
                  <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="<?php echo $name ?>" maxlength="50">
                </div>
                <div class="form-group">
                  <input type="text" name="lastname" id="lastnamename" tabindex="1" class="form-control" placeholder="Lastname" value="<?php echo $name ?>" maxlength="50">
                </div>
                <div class="form-group">
                  <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>" maxlength="50">
                </div>
                <div class="form-group">
                  <input type="password" name="pass" id="password" tabindex="2" class="form-control" placeholder="Password">
                </div>
                 <!--  <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div> -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                      <input type="submit" name="btn-signup" id="register-submit" tabindex="4" class="form-control btn btn-info" value="Register Now">
                      <span class="text-danger"><?php echo $passError; ?></span>
                    </div>
                  </div>
                </div>
                <input type="hidden" class="hide" name="token" id="token" value="7c6f19960d63f53fcd05c3e0cbc434c0">
                </form>
              </div>
            </ul>
          </li>
                    
          <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">Log In <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
              <div class="col-lg-12">
                <div class="text-center"><h3><b>Log In</b></h3></div>
                <form id="ajax-login-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form" autocomplete="off">
                    <?php
                    if ( isset($errMSG) ) {
                     echo $errMSG; ?>
                    <?php
                     }
                    ?>
                  <div class="form-group">
                    <label for="usr">Email:</label>
                    <input type="email" name="email" class="form-control" id="usr" value="<?php echo $email; ?>" maxlength="50"/>                                        
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="pass" class="form-control" id="pwd" maxlength="50"/></div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-7">
                      <input type="checkbox" tabindex="3" name="remember" id="remember">
                      <label for="remember"> Remember Me</label>
                    </div>
                    <div class="col-xs-5 pull-right">
                      <input type="submit" name="btn-login" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Log In">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="text-center">
                      <span class="text-danger"><?php echo $emailError; ?></span>
                      <span class="text-danger"><?php echo $passError; ?></span>
                    </div>
                 </div>
              </div>
            </div>
            <input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
          </form>
        </div>
      </ul>
    </li>
  </ul>
</div>
</nav>

<main role="main" class="container">  <!-- MAIN CONTAINER  -->    

 <section>
      <div class="container" id="index_text">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 mx-auto text-center" id="index-bg">
            <h1 class="mt-0">Recipe 4 Me</h1>
            <h3>Your personal recipes</h3>
            <h5>Manage your favorites cooking recipes wherever you are!</h5>
          </div>
        </div>
      </div>
    </section>

</main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>