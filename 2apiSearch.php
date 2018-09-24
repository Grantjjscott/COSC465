<?php
error_reporting(0);

$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';
$version = '1.0.0';
$appid = 'JonahDow-Books-PRD-793587284-2ba1979c'; 
$globalid = 'EBAY-US';
$query = $_GET['query']; 
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
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
	$price = $item->sellingStatus->currentPrice;

    $results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td><tr><td>Most recent listing: $$price</tr></td>";
  }
}

else {
  $results  = "<h3> Not able to find ";
  $results .= "results.</h3>";
}

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
						<input type = "text" name = "query" value = "">
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
			</p>
	</body>
</xml>