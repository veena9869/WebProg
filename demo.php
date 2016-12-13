<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$clientId = "6566405a900d23fa9219";
$clientSecret = "05f927fdb8edef060b7b2970782441e68fcf3595";
$redirect_url = 'http://vtalapaneni.cs518.cs.odu.edu/demo.php';

$ROOTURI = "http://vtalapaneni.cs518.cs.odu.edu/loginform.php";

if(isset($_GET['code'])) {
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL,"https://github.com/login/oauth/access_token");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,
    http_build_query(array(
      'code' => $_GET['code'],
      'client_id' => $clientId,
      'client_secret' => $clientSecret
    ))
  );
  curl_setopt($ch, CURLOPT_HTTPHEADER,array("Accept: application/json"));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $server_output = curl_exec ($ch);
  curl_close ($ch);

  $json = json_decode($server_output,true);

  if( !$json ||
    !isset($json['access_token']) ||
    strpos($json['access_token'],' ') !== FALSE){echo " <a href='$ROOTURI'>click here to reload</a> ";die();}

  $accessToken = json_decode($server_output,true)["access_token"];

 
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.github.com/user?access_token='.$accessToken,
    CURLOPT_USERAGENT => 'demo',
    CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded","Accept: application/json")
));

$resp = curl_exec($curl);

curl_close($curl);

$git = json_decode($resp,true);
 echo $resp;
echo $git["name"];
echo $git["avatar_url"];


}

 else {
  $url = "https://github.com/login/oauth/authorize?client_id=$clientId&redirect_uri=$redirect_url&scope=user";
  header("Location: $url");
}
?>
