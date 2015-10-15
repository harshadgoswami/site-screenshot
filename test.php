<?php

$apiKey = "AIzaSyCcueT3pyZPSYwDLwG50s8cOpS6BpsxPc0";
$url = "https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=http://www.stackoverflow.com/&key=".$apiKey."&screenshot=true";
$sources = file_get_contents($url);
$arrResult = json_decode($sources,true);
# echo "<pre>";
# print_r($arrResult);
# $arrResult["screenshot"]["data"];
# $arrResult["screenshot"]["mime_type"];
# $arrResult["screenshot"]["width"];
# $arrResult["screenshot"]["height"];

{
	$fp = fopen('test.jpg', 'w');
	$arrResult["screenshot"]["data"] = str_replace("_","/",$arrResult["screenshot"]["data"]);
	$arrResult["screenshot"]["data"] = str_replace("-","+",$arrResult["screenshot"]["data"]);
	fwrite($fp, base64_decode($arrResult["screenshot"]["data"]));
	fclose($fp);
	#echo "created";
}

?>
<!--
We can directly make it visible like this too..

<img src="data:image/jpeg;base64,<?=$arrResult["screenshot"]["data"]?>" />
-->

<img src="test.jpg" />