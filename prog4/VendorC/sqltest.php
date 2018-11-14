<?php
include "comm.php";
$product = (string)$_REQUEST['productName'];
  $sql = "SELECT  ID, Name, Price, Quantity From items WHERE Name= ('$category') AND WHERE Quantity >= ('$quantity') AND WHERE PRICE <= ('$maxPrice')";
$result = $conn->query($sql);
print_r ($result);

  if ($result->num_rows >0){
      while($row = $result->fetch_assoc())  {
          echo "found item";
          $name = $row["Name"];
          $id =   $row["ID"];
          $price = $row["Price"];
          $quantity = $row["Quantity"];
        echo "<br>".$name;
      }

      }else{
        echo "no prodcut";
    }
?>
