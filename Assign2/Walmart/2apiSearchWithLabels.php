<?php
error_reporting(0);

$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';
$version = '1.0.0';
$appid = 'JonahDow-Books-PRD-793587284-2ba1979c';
$globalid = 'EBAY-US';
$query = $_GET['query'];
$numquery = $_GET['numValue'];
$safequery = urlencode($query);

$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=10";

$resp = simplexml_load_file($apicall);

if ($resp->ack == "Success") {
  $results = '';
  foreach($resp->searchResult->item as $item){
	if($item->sellingStatus->currentPrice <= $numquery)
	{
		$pic   = $item->galleryURL;
		$link  = $item->viewItemURL;
		$title = $item->title;
		$price = $item->sellingStatus->currentPrice;
		$results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td><tr><td>Most recent listing: $$price</tr></td>";
	}
  }
}

else {
  $results  = "<h3> Not able to find ";
  $results .= "results.</h3>";
}

// API request variables;
  $string ='http://api.walmartlabs.com/v1/search?query=ipod&format=json&apiKey=nhqnfqjchruvskk5y67rfbmk';
  $endpoint ='http://api.walmartlabs.com/v1/search';
  $query = $_GET['query'];
  $numquery2 = $_GET['numValue'];
  $format = 'json';
  $apiKey ='nhqnfqjchruvskk5y67rfbmk';
  $safequery=urlencode($query);
  //construct call
  $apicall = "$endpoint?";
  $apicall .= "query=$safequery";
  $apicall .= "&format=$format";
  $apicall .="&apiKey=$apiKey";

  //echo $apicall;
//Assigns the JSON file to $resp
$resp = file_get_contents($apicall);
//echo $resp;
//Assigns the decoded JSON file to $items

$items = json_decode ($resp, true);
for($i = 0; $i < 10; $i++)
{
	if($items['items'][$i]['msrp'] > $numquery2)
		unset($items['items'][$i]);
}
//Prints the queried item's name
// print_r($items['items'][0]['name']);
// echo '<br>';
//Prints the queried item's MSRP
// print_r($items['items'][0]['msrp'])
//Everything below is code not being used right now, but I didn't want to get rid of it until I was sure we wouldn't need it
 //print_r($items);
 //echo $items.name;
 //var_dump($items->{'name'});
 //echo $items->name;
  // foreach($data["items"] as $item){
    // echo $item;
   //}#$S
 //echo $items;
 //echo $items['name'];
// if (is_array($items))
// foreach($items['items'] as $value){
//   echo $value;
// }

?>
<xml>
	<title>
		Book Search!
	</title>
	<body>
		Please enter a book title or ISBN number:
		<table>
			<tr>
				<td>
					<form method="GET">
						<?php echo 'Item name: ';
							  echo '<br>';?>
						<input type = "text" name = "query" value = "">
						<?php echo '<br><br>';
							  echo 'Price limit: '; 
							  echo '<br>';?>
						<input type = "number" name = "numValue" value = "">
						<?php echo '<br>'?>
						<input type = "submit" value = "Search">
					</form>
				</td>
			</tr>
			<tr>
				<td>
					<p>
					<b>Ebay results:</b>
					</p>
					<?php echo $results;?>
				</td>
			</tr>
		</table>
			<p>
				<b>Walmart results:</b>
				<?php
				for($i = 0; $i < 10; $i++)
				{
					if($items['items'][$i]['msrp'] > 0)
					{
						echo '<br>';
						print_r($items['items'][$i]['name']);
						echo '<br>';
						print_r("$" . $items['items'][$i]['msrp']);
						echo '<br>';
					}
				}
				?>
			</p>
	</body>
</xml>
