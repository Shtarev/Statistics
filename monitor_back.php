<?php
/* ADMIN*/
$db = new MySQLi('localhost', 'root', '', 'test');
/* ************************************************** */
// PHP
$date = date("d.m.y");
$all = $db->query("SELECT COUNT(*) FROM `monitor`")->fetch_array(MYSQLI_NUM)[0];
$allDate = $db->query("SELECT DISTINCT date FROM `monitor`")->fetch_all(MYSQLI_ASSOC);

$dateArr = array();
$key;
$i = 0;
foreach($allDate as $value){
    $test = substr($value['date'], 3);
    if($key == $test) {
        $dateArr[$key][$i] = $value['date'];
        $i++;
    }
    else {
        $key = $test;
        $i = 0;
        $dateArr[$key][$i] = $value['date'];
        $i++;
    }
}
if(isset($_GET['date'])){$date = $_GET['date'];}
$thisDateClients = $db->query("SELECT * FROM `monitor` WHERE date='$date'")->fetch_all(MYSQLI_ASSOC);
$thisDateCount = $db->query("SELECT COUNT(*) FROM `monitor` WHERE date='$date'")->fetch_array(MYSQLI_NUM)[0];
/* ************************************************** */
// HTML
echo "Besuche insgesamt: ".$all."<hr>";
echo "Monaten Besuche: <br>";
foreach($dateArr as $key=>$value) {
    echo "<details>";
    echo "<summary><b>".$key."</b></summary>";
    foreach($value as $value2){
        echo "<a href='?date=".$value2."'>".$value2."</a><br>";
    }
    echo "</details><br>";
}
echo "<hr>";
echo "Besuche ins Datum ".$date." - <i>".$thisDateCount." Menschen</i><br>";
foreach($thisDateClients as $value) {
    echo "<details>";
    echo "<summary><b>Kunde № ".$value['client']."</b></summary>";
    echo "<b>Kunde IP: ".$value['client_ip']."</b><br>";
    echo "<b>Gekommen von der Adresse: ".$value['clienr_referer']."</b><br>";
    echo $value['site'];
    echo "</details><br>";
}