<?php

$apiKey = "{Your_Api_key}"; 
$site = "http://www.stackoverflow.com"; # take screen shot of this site

$url = "https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=".$site."&key=".$apiKey."&screenshot=true";
$sources = file_get_contents($url);
$arrResult = json_decode($sources,true);

{
	$fp = fopen('test.jpg', 'w');
	$arrResult["screenshot"]["data"] = str_replace("_","/",$arrResult["screenshot"]["data"]);
	$arrResult["screenshot"]["data"] = str_replace("-","+",$arrResult["screenshot"]["data"]);
	fwrite($fp, base64_decode($arrResult["screenshot"]["data"]));
	fclose($fp);
}

?>
<!--
You can directly make it visible like this too..

<img src="data:image/jpeg;base64,<?=$arrResult["screenshot"]["data"]?>" />
-->

<img src="test.jpg" />