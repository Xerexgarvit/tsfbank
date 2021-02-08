<!doctype html>
<html lang="en">

<?php
    include("functions.php");
?>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
   
  <title>Transaction</title>
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



          <?php
               if(isset($_GET['ID'])) {
                  $c_ID = $_GET['ID'];
                  $get = "select * from customer where id='$c_ID'";
                  $result = mysqli_query($conn, $get);
                  $set = mysqli_fetch_array($result);
                  $ID = $set['ID'];
                  $Name = $set['Name'];
                  $Balance = $set['Balance'];
                
                  echo"
                      <form action='transfer.php?ID=$c_ID' method='post' enctype='multipart/form-data'>
                      <div class='form-row'>
                        <div class='col-lg-6 col-md-6 col-sm-12 mb-3 mx-auto col1'>
                          <label for='from' style='font-size: 20px;padding-left:35vh;padding-top:4vh;'>Sender</label>
                            <br>
                                  <label for='Sender_Account' style='padding-left:35vh;'>ID</label>
                                  <input type='number' class='form-control' name='Sender_Account' style='padding-left:35vh;' value='$ID' readonly>
                                    <br>
                                  <label for='Sender_Name' style='padding-left:35vh;'>Name</label>
                                  <input type='text' class='form-control' name='Sender_Name' style='padding-left:35vh;' value='$Name' readonly>
                                    <br>
                                  <label for='curr_bal' style='padding-left:35vh;'>Balance</label>
                                  <input type='number' class='form-control' style='padding-left:35vh;' name='curr_bal' value='$Balance' readonly>
                        </div>
                            
                        <div class='col-lg-6 col-md-6 col-sm-12 mb-3 mx-auto col2'>  
                             <label for='to' style='font-size: 20px;padding-left:35vh;padding-top:4vh;'>Reciever</label>
                                <br>
                                  <label for='Reciever' style='padding-left:35vh;'>ID</label>
                                  <select class='form-control' style='padding-left:34vh;' name='Reciever' required>
                                      <option value='0'>Select Account</option>
                                ";
                                      $get = "select * from customer";
                                      $result = mysqli_query($conn, $get);
                                      while($set= mysqli_fetch_array($result)) {
                                          $ID = $set['ID'];
                                          $Name = $set['Name'];
                                          echo "<option value='$ID'>$Name</option>";
                                      }
                                      echo"
                  
                                  </select>
                              <br>
                                  <label for='Amount' style='padding-left:35vh;'>Amount</label>
                                  <input type='number' class='form-control' style='padding-left:35vh;' name='Amount' placeholder='Type Amount' required>
                              
                          </div>
                         
                         
                      </form>
                      <center>
                      <button type='submit' class='btn btn-dark' style='margin-left:100vh;' name='transfer'>Send</button>
                      <button class='btn btn-dark my-2'>
                                      <a href='customers.php' style='text-decoration: none; color:white;'>Cancel</a>
                                  </button>
                    </div>
                  ";
              }
          ?>
 


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
      <!-- Activity section -->
          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





</body>

</html>

<?php
    if (isset($_POST['transfer'])) {
        $curr_bal = $_POST['curr_bal'];
        $Date = date('d-m-Y H:i:s a');
        $Sender_Account = $_POST['Sender_Account'];
        $Sender_Name = $_POST['Sender_Name'];
        $Reciever = $_POST['Reciever'];
        $Amount = $_POST['Amount'];
        
        if($Reciever!= 0){
            $get= "select Balance from customer where id=$Sender_Account";
            $result= mysqli_query($conn, $get);
          
            $set=  mysqli_fetch_array($result);
            echo 
            mysqli_error($conn);
            
            if($Amount <= $set ['Balance']){
                $f_customer = "update customer set Balance=Balance-$Amount where id=$Sender_Account";
                $run_f_customer = mysqli_query($conn, $f_customer);
              

                $t_customer = "select Balance from customer where id=$Reciever";
                $run_t_customer = mysqli_query($conn, $t_customer);
                $row_t_customer = mysqli_fetch_array($run_t_customer);
                $to_CurrentBalance = $row_t_customer['Balance'];
                 $t_customer_1 = "update customer set Balance=$to_CurrentBalance+$Amount where id=$Reciever";
                 $run_t_customer_1=mysqli_query($conn,$t_customer_1);
                 
                 $insert_transfer = "insert into transfer(Date,Sender_Account, Sender_Name,Reciever,Amount) values ('$Date', $Sender_Account, '$Sender_Name', $Reciever, $Amount)";
          
                
                $run_transfer = mysqli_query($conn , $insert_transfer);


                if($run_f_customer && $run_t_customer && $run_t_customer_1 && $run_transfer){ 
                    echo '<script>alert("Transaction complete")</script>';
                  
                
                
                
              
                    echo '<script>window.open("customers.php", "_self")</script>';}   
                else {
                    echo '<script>alert("Unable to transfer")</script>';}
                }
            else {
                echo '<script>alert("Insufficient Balance!!!")</script>';}
            } 
        else {
            echo '<script>alert("Please select a Reciever!!!")</script>';
        }
    }
?>

