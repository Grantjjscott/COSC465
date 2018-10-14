<?php
include 'comm.php';
$sql = "SELECT id,email,username FROM person";
$result = $conn->query($sql);

// while
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	  echo "ID:     ". $row["id"];
		echo "  Name: " . $row["username"];
		echo " Email: " . $row["email"]. "<br>";
		//break;
    }
} else {
    echo "0 results";
}

?>
