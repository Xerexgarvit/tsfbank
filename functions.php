<?php

$conn = mysqli_connect("localhost","root","","tsfbank");
function get_customer(){
    global $conn;
    $get="SELECT * FROM customer";
    $result=mysqli_query($conn, $get) or die(mysqli_error($conn));
    While($set=mysqli_fetch_array($result)){
            $customer_ID=$set['ID'];
            $customer_Name = $set['Name'];
            $customer_Email = $set['Email'];
            $customer_Balance = $set['Balance'];
            echo
      "<tr>
            <td>$customer_ID</td>
            <td><a href='details.php?customer_id=$customer_ID'>$customer_Name</a></td>
            <td>$customer_Email </td>
            <td>$customer_Balance </td>
            </tr>
    ";
        }
    }

    function get_history(){
        global $conn;
        $get="SELECT * FROM transfer";
        $result=mysqli_query($conn, $get) or die(mysqli_error($conn));
        While($set=mysqli_fetch_array($result)){
                $Date=$set['Date'];
                $Sender_Account = $set['Sender_Account'];
                $Sender_Name = $set['Sender_Name'];
                $Reciever = $set['Reciever'];
                $Amount = $set['Amount'];
                echo
          "<tr>
                <td>$Date</td>
                <td>$Sender_Account</td>
                <td>$Sender_Name</td>
                <td>$Reciever</td>
                <td>$Amount</td>
                </tr>
        ";
            }
        }
    ?>