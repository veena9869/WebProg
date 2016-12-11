<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$client_ID = "6566405a900d23fa9219";
$client_Secret = "05f927fdb8edef060b7b2970782441e68fcf3595";

$redirect_url = 'http://vtalapaneni.cs518.cs.odu.edu/demo.php';
$ROOTURI = 'http://vtalapaneni.cs518.cs.odu.edu/index.php';

if(isset($_GET['code'])) {
  $curlinit = curl_init();

  curl_setopt($curlinit, CURLOPT_URL,"https://github.com/login/oauth/access_token");
  curl_setopt($curlinit, CURLOPT_POST, 1);
  curl_setopt($curlinit, CURLOPT_POSTFIELDS,
    http_build_query(array(
      'code' => $_GET['code'],
      'client_id' => $client_ID,
      'client_secret' => $client_Secret
    ))
  );
  curl_setopt($curlinit, CURLOPT_HTTPHEADER,array("Accept: application/json"));
  curl_setopt($curlinit, CURLOPT_RETURNTRANSFER, true);
  $curlexec = curl_exec ($curlinit);
  curl_close ($curlinit);

  $jsondecode = json_decode($curlexec,true);

  if( !$jsondecode ||  !isset($jsondecode['access_token']) ||strpos($jsondecode['access_token'],' ') !== FALSE)
  {
      echo " <a href='$ROOTURI'>Try again</a>";
        die();
                                                
  }

  $access_token = json_decode($curlexec,true)["access_token"];
$ci = curl_init();
curl_setopt_array($ci, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.github.com/user?access_token='.$access_token,
    CURLOPT_USERAGENT => 'demo',
    CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded","Accept: application/json")
));

$cexec = curl_exec($ci);
curl_close($ci);

$final = json_decode($cexec,true);
//echo $cexec;

} else {
  $url = "https://github.com/login/oauth/authorize?client_id=$client_ID&redirect_uri=$redirect_url&scope=user";
  header("Location: $url");
}
?>
