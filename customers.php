<!doctype html>
<html lang="en">

<?php
    include("functions.php");
  ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">


  <title>Customers</title>
</head>

<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">TSF</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="history.php">History </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customers.php">View Customers </a>
      </li>
    </ul>
  </div>
</nav>

    <br>

    <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID </th>
                        <th scope="col">Name </th>
                        <th scope="col">Email </th>
                        <th scope="col">Balance </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        get_customer();
                    ?>
                </tbody>
            </table>
        </div>
 

        <footer>
    <div class="row p-4 bg-dark">
    <div class="col-lg-4 col-md-4 col-sm-4 c">
        <a href="https://www.instagram.com/__garvit__chauhan__/"><i class="fa fa-instagram" aria-hidden="true" ></i></a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 c">
        <a href="https://www.linkedin.com/in/garvit-chauhan-a26295200"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 c">
        <a href="https://github.com/Xerexgarvit"><i class="fa fa-github" aria-hidden="true"></i></a>
      </div>
    </div>
      <div>
        <div class="container-fluid bg-dark social">
        Social Platforms
        </div>
      </div>
  </footer>
 


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</body>

</html>