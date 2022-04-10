<?php
require_once "config.php";

$username = $email = $position = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
  //check if username is empty
  if(empty(trim($_POST["username"]))){
    $username_err = "Username cannot be blank";
  }
  else
  {
    $username = trim($_POST['username']);
  }
  /*else{
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      //set value of param username
      $param_username = trim($_POST['username']);
      //try to execute
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) == 1)
            $username_err = "This username is already taken";
          else
          {
            $username = trim($_POST['username']);
          }
      }
      else
        echo "Something went wrong";
    }
  }
    mysqli_stmt_close($stmt);*/
  
  
//}
//Check for email
if(empty(trim($_POST['email']))){
  $email_err = "Email cannot be blank";
}
else{
  $email = trim($_POST['email']);
}
//Check for password
if(empty(trim($_POST['password']))){
  $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 6){
  $password_err = "Password should be atleast 6";
}
else{
  $password = trim($_POST['password']);
}

//Check for confirm password field
if(trim($_POST['password']) != trim($_POST['confirm_password'])){
  $confirm_password_err = "Passwords not matching";
}

$position = $_POST['position'];
//if no errors insert in database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err && empty($email_err))){
  $sql = "INSERT INTO users (username, email, position, password) VALUES(?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  if($stmt)
  {
    mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_position, $param_password);
    //set these parameters
    $param_username = $username;
    $param_email = $email;
    $param_position = $position;
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    //$param_password = $password;
    echo $param_password;
    //try to execte the query
    if(mysqli_stmt_execute($stmt))
    {
      header("location: login.php");
    }
    else
    {
      echo "Something went wrong";
    }
  }
  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Notes App</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

    <div class="container mt-4">
      <div class="row">
        <div class="col-sm-4 mx-auto">
          <h2 class="my-4">Signup Form</h2>
          <form action="" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control">
              <span class="error"><?php echo $username_err?></span>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control">
              <span class="error"><?php echo $email_err?></span>
            </div>

            <div class="form-group">
              <label>Role</label>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="position" value="Student" checked>Student
                <label class="form-check-label" for="radio1"></label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="position" value="Teacher">Teacher
                <label class="form-check-label" for="radio2"></label>
              </div>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
              <span class="error"><?php echo $password_err?></span>
            </div>

            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control">
              <span class="error"><?php echo $confirm_password_err?></span>
            </div>

            <button class="btn button my-4" type="submit">Signup</button>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
          </form>
        </div>
      </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>