<?php
if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
 $ip = $_SERVER['HTTP_CLIENT_IP'];
} 
else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
 $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} 
else {
 $ip = $_SERVER['REMOTE_ADDR'];
}
echo "IP address is: ".$ip;

echo "<br><br>";
$client = $_SERVER['HTTP_USER_AGENT'];
echo "Operating system: ".explode(";",$client)[1]."";
echo "<br>";
echo "Browser: ".end(explode(" ",$client));

echo"<br><br>";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
echo "<br><br><br>";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
$params = json_decode($result);
echo "Continent Name: ".$params->geoplugin_continentName."<br>";
echo "Country Name: ".$params->geoplugin_countryName."<br>";
echo "Country Code: ".$params->geoplugin_countryCode."<br>";
echo "City Name: ".$params->geoplugin_city."<br>";
echo "Currency Rate: ".$params->geoplugin_currencyConverter."<br>";
echo "Latitude: ".$params->geoplugin_latitude."<br>";
echo "Longitude: ".$params->geoplugin_longitude."<br>";

?>