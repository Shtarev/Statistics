<?php
/* CLIENT */
session_start();
$db = new MySQLi('localhost', 'root', '', 'test');
/* ************************************************** */

/* SKRYPT - DIE EINTRAGUNG IN DB */
$date = date("d.m.y");
$time = date("H:i:s");
$site = $_SERVER['REQUEST_URI'];
$clientIp = clientIp();
$client = ($_SESSION['clien']) ? $_SESSION['clien'] : $_SESSION['clien'] = rand(1, 10000000); 
$referer = ($_SERVER['HTTP_REFERER']) ? "Ist von der Adresse gekommen: ".$_SERVER['HTTP_REFERER'] : "Der Kunde ist von der unbekannten Adresse gekommen"; 

$thisClient = $db->query("SELECT site FROM `monitor` WHERE client='$client'")->fetch_array();

if($thisClient) {
    $site = $thisClient['site']."Hat die Seite besucht ".$site." Zeit des Besuches: ".$time."<br>";
    $result = $db->query("UPDATE `monitor` SET site='$site' WHERE client='$client'");
}
else {
    $site = "Hat die Seite besucht ".$site." Zeit des Besuches: ".$time."<br>";
    $result = $db->query("INSERT INTO `monitor` (client, client_ip, clienr_referer, site, date) VALUES ('$client', '$clientIp', '$referer', '$site', '$date')");
}
function clientIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];  
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];  
    $remote  = @$_SERVER['REMOTE_ADDR'];  

    if(filter_var($client, FILTER_VALIDATE_IP)) {  
        $ip = "Ein echter IP des Kunden: ".$client." Kunde verwendet nicht Proxy Server";  
    }  
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) {  
        $ip = "Ein echter IP des Kunden: ".$forward." Kunde verwendet Proxy Server";  
    }  
    elseif(filter_var($remote, FILTER_VALIDATE_IP)) {  
        $ip = "Ein echter IP des Kunden: ".$remote." Kunde verwendet Proxy Server";  
    }  
    else {  
        $ip = "Kunden-IP ist unklar";  
    }  
    return $ip;
}