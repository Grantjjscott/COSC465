<?php
	include 'comm.php';
	$LessonName = $_REQUEST['LessonName'];
	$sql = "SELECT LessonNo, LessonName FROM lessons WHERE LessonName =('$LessonName')";
	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) {
	  echo $row["LessonName"]. " is lesson number ";
	  echo $row["LessonNo"];
    }
}
else
{
  echo "Course is not offered";
}
?>