<?php  
session_start();

require_once('./require/Utils.php');

$conn = Connect_To_Database();

if ($conn) {


      $sqlp = "SELECT * FROM OrderProducts WHERE id_u= '".$_SESSION['id']."'";
      $result = $conn->query($sqlp);

      if ($result->num_rows > 0) 
      {
          $row = $result->fetch_assoc();

          if ($row['confirmed'] == '0') {


            $sql4 = "UPDATE OrderProducts SET  confirmed = '1'  WHERE id_u= '".$_SESSION['id']."'";

            if ($conn->query($sql4) === TRUE){}
            
              Redirect('preorderproducts.php', false);
          } else {
              Redirect('home.php', false);
          }


          }

        }