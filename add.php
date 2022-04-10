<?php
    require_once "config.php";
    session_start();
    $title = $description = "";
    $title_err = $description_err = "";
    $user_id = $_SESSION['id'];
    //echo $user_id;
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('Y-m-d H:i:s');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(empty(trim($_POST["title"]))){
            $title_err = "Title cannot be blank";
        }
        else
        {
           $title = trim($_POST['title']);
        }
        if(empty(trim($_POST["description"]))){
            $description_err = "Description cannot be blank";
        }
        else
        {
           $description = trim($_POST['description']);
        }
        if(empty($title_err) && empty($description_err))
        {

            // Sql query to be executed
            // $sql = "INSERT INTO notes (user_id, title, description) VALUES ('$user_id, '$title', '$description')";
            // $result = mysqli_query($conn, $sql);

            
            // if($result){ 
            //     $insert = true;
            // }
            // else{
            //     echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            // } 
            $sql = "INSERT INTO notes (user_id, title, description, timestamp) VALUES(?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt, "ssss", $param_user_id, $param_title, $param_description, $param_timestamp);
                //set these parameters
                $param_user_id = $user_id;
                $param_title = $title;
                $param_description = $description;
                $param_timestamp = $timestamp;
                //try to execte the query
                if(mysqli_stmt_execute($stmt))
                {
                header("location: main.php");
                }
                else
                {
                echo "Something went wrong";
                }
        }
        mysqli_stmt_close($stmt);
        }
        
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
        <?php
        include('header.php');
        ?>
      <div class="container my-4">
      <h2 class="text-center my-4">Add Note</h2>
      <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" class="form-control" name="title" id="title">
            <span class="error"><?php echo $title_err?></span>
        </div>
        <br/><br/>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control text" name="description" id="description" rows="8"></textarea>
            <span class="error"><?php echo $description_err?></span>
        </div>
        <br><br>
        <button type="submit" class="btn button ">Save</button> 
    </form>
    </div>
  </body>
  </html>