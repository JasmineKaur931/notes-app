<?php
require_once "config.php";
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
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

        <h2 class="text-center my-4">Your Notes</h2>
        <div class="container my-4">
        <div class="row">
        <?php 
          require_once "config.php";  
          session_start();
          $user_id = $_SESSION['id'];
          $sql = "SELECT * FROM `notes` where user_id = $user_id";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<h3 class='col-md-1 my-2'>". $sno . "</h3> 
            <h3 class='col-md-4'> ". $row['title'] . "</h3>
            <p>". $row['description'] . "</p>
            <button class='btn button delete col-md-2 text-center' id=d".$row['id'].">Delete</button>
            <hr><br/>";
        } 
          ?>
          </div>

  </div>
  
  <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `mynotes.php?delete=${sno}`;
          
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
  </body>
  </html>
  <!-- <td>". $row['description'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
          </tr>"; -->

          <!-- <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
          <td><a href='delete.php?id=".$book['Staff_ID']."'></a></td>" -->