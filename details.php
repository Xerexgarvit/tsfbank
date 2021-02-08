<!doctype html>
<html lang="en">

<?php
    include("functions.php");
?>

<head>

   <title>Info</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
   
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
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customers.php">View Customers </a>
      </li>
    </ul>
  </div>
</nav>


      <div class="container my-4">
        <?php
            if(isset($_GET['customer_id'])) {
                $ID = $_GET['customer_id'];
                $get = "select * from customer where id='$ID'";
                $result = mysqli_query($conn, $get);
                while($set = mysqli_fetch_array($result)) {
                    $ID = $set['ID'];
                    $Name = $set['Name'];
                    $Email = $set['Email'];
                    $Balance = $set['Balance'];
                    echo"
   
                        <table class='table table-bordered' style='text-align: center; font-size: 18px;'>
                            <tr>
                                <th scope='col'>ID</th>
                                <td>$ID</td>
                            </tr>
                            <tr>
                                <th scope='col'>Name</th>
                                <td>$Name</td>
                            </tr>
                            <tr>
                                <th scope='col'>Email</th>
                                <td>$Email</td>
                            </tr>
                            <tr>
                                <th scope='col'>Balance</th>
                                <td>$Balance</td>
                            </tr>
                        </table>
                        </div>
                          

                        <div class='row'>
                            <div class='col-12'>
                                <center>
                                    <button class='btn bg-dark'>
                                        <a href='customers.php' style='text-decoration: none; color: white;'>View Customers</a>
                                    </button>
                                </center>
                  
                            <div class='col-12 '>
                                <center>
                                    <button class='btn bg-dark mt-2'>
                                        <a href='transfer.php?ID=$ID' style='text-decoration: none; color: white;'>Send Money</a>
                                    </button>
                                </center>
                            </div>
                        </div>
                    ";
                }
            }
        ?>
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