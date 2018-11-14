<html>
	<h2>Here's what our users have to say</h2>
</html>

<?php
include 'comm1.php';
$sql = "SELECT username, comment from comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	  echo "<b>Here's what </b>". $row["username"]. "<b> had to say!</b>" . "<br>"."<br>"."<br>";
		echo $row["comment"]. "<br>". "<br>"."<br>"."<br>";
    }
} else {
    echo "0 results";
}

?>
