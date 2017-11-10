<?php 

$from = "daniel.baez@comparabien.com";
$from_name = "dwdwdw";
$to =array('daniel.baez@comparabien.com');
$subject = "wfw dasdasdasd";
$template = 'dfefefe {firstname}';

$data = "apikey=".urlencode("3c92335b-5b0c-4025-89ba-34a6ff57c75b");
$data .= "&charset=utf-8";
//$data .= "&charsetBodyHtml=utf-8";
$data .= "&subject=".urlencode($subject);
$data .= "&from=".urlencode($from);
//$data .= "&fromName=".urlencode($from_name);
$data .= "&to=".urlencode(implode(',', $to));
$data .= "&bodyHtml=".urlencode($template);
$data .= "&encodingType=Base64";
$data .= "&merge_firstname=dsfs3rfre,3232ewe";

$url = 'https://api.elasticemail.com/v2/email/send';
$timeout = 20;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FAILONERROR,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_RANGE,"1-2000000");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,  CURLOPT_REFERER,@$_SERVER['REQUEST_URI']);
$result = curl_exec($ch);

$decode = json_decode($result, true);
print_r($decode);

 ?>