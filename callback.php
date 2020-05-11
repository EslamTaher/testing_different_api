<?php

include __DIR__.'/config.php';
echo APP_SECRET;
echo APP_ID;
echo REDIRECT_URL;


$secret = APP_SECRET;
$app_id = APP_ID;
$redirect = REDIRECT_URL;
if(function_exists('json_decode')){
    echo "ah mwgoda<hr>";
}
echo isset($_GET['code']) ;
if (isset($_GET['code'])){
echo "call back ";
    var_dump($_GET);
echo "<hr>";
echo $_GET['code'];
}
echo "<hr>";
echo "<hr>";
echo "https://graph.facebook.com/v3.2/oauth/access_token?client_id=$app_id&client_secret=$secret&code={$_GET['code']}&redirect_uri={$redirect}";
echo "<hr>";
echo "<hr>";
echo "<hr>";
echo "<hr>";
if (isset($_GET['code'])){
    $curl = curl_init();
    
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://graph.facebook.com/v3.2/oauth/access_token?client_id=$app_id&client_secret=$secret&code={$_GET['code']}&redirect_uri={$redirect}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$data = json_decode( $response);
echo "ddddDd",property_exists($response,'error');
echo "<hr>";
echo "<hr>";
var_dump($data->access_token);
echo "<hr>";
echo "<hr>";
echo isset($data->error->message);
echo "<hr>";
echo "<hr>";

session_start();
$_SESSION['token']=$data->access_token;
header('location:/profile.php');

echo "<hr>";
echo "<hr>";










echo "<hr>";
echo "<hr>";

}
echo "<hr>";
