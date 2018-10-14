<?php
/*$_request('error')
if($error==1){
echo ()"Error encountered");
exit;

else{ the code}
}
*/
 $servername = "localhost";
    $dbname = "dealer";
    $username = "root";
    $password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error){
die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT id,name,email FROM users";
$result = $conn->query($sql);

// while
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	  echo "ID:     ". $row["id"];
		echo "  Name: " . $row["name"];
		echo " Email: " . $row["email"]. "<br>";
		//break;
    }
} else {
    echo "0 results";
}


/*
// foreach
if ($result->num_rows > 0) {
    // output data of each row


   // Fetch all
    $all_rec = mysqli_fetch_all($result,MYSQLI_ASSOC); // MYSQLI_NUM

	//print_r($all_rec);
	//exit;
   foreach($all_rec as $row){

		echo " Name: " . $row["name"];
		echo " Email" . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
*/


$conn->close();
?>
