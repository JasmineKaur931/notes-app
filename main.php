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
      <section class="home">
        <div class="container-fluid tag">
          <h1 class="mx-auto">Welcome</h1>
          <a class="btn button" href="add.php">Add Notes</a>
          <a class="btn button" href="mynotes.php">My Notes</a>
          <a class="btn button" href="allnotes.php">All Notes</a>
        </div>
      </section>

  </body>
  </html>