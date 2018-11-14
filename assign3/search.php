<?php
	include 'comm.php';
	$LessonName = $_GET['LessonName'];
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

$sql = "SELECT  ID, Name, Price, Quantity From items WHERE Name= ('bananas') ";
$result = $conn->query($sql);

if ($result->num_rows >0){
	while($row = $result->fetch_assoc())  {
		$data = array();
		$data['title'] = "bananas";
		$data['id'] = "4011";
		$data['price'] = ".0012";
		$data['quantity'] = "200";

		elseif ($category == "apples") {
			$data = array();
			$data['title'] = "apples";
			$data['id'] = "4017";
			$data['price'] = ".45";
			$data['quantity'] = "200";

			return $data;
		}
			elseif ($category == "mangos"){
				$data = array();
				$data['title'] = "Mangos";
				$data['id'] = "5056";
				$data['price'] = ".75";
				$data['quantity'] = "50";

				return $data;
			}

			require_once 'nusoap/lib/nusoap.php';

			include "comm.php";


			function getProd($category){

			  if ($category == "bananas") {
			    $sql = "SELECT  ID, Name, Price, Quantity From items WHERE Name= ('bananas') ";
			    $result = $conn->query($sql);
			    print_r ($result);

			      if ($result->num_rows >0) {
			          while($row = $result->fetch_assoc())  {
			              $name = $row["Name"];
			              $id =   $row["ID"];
			              $price = $row["Price"];
			              $quantity = $row["Quantity"];
			          }
			          $data = array();
			          $data['title'] = $name;
			          $data['id'] = $id;
			          $data['price'] = $price;
			          $data['quantity'] = $quantity;
			          return $data;
			        }
			        return"ummm";
			  } else {
			    return "No Products at Vendor A... checking other vendors";
			  }
			}
			 $server = new soap_server();
			 $server->register("getProd");
			  //$server->service($HTTP_RAW_POST_DATA);

			  if ( !isset($HTTP_RAW_POST_DATA) ) {
			    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
			  }
			  $server->service($HTTP_RAW_POST_DATA);
			 ?>
