<?php
$thisDay = date("l");
$setday = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
$setdayTH = array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์","วันอาทิตย์");
$dayTH ='วันพฤหัสบดี';

for($l=0;$l<7;$l++){
    if($dayTH==$setdayTH[$l])$input=$setday[$l];
}
//echo $input.'<br>';

for($k = 0 ; $k < 7 ; $k++){
    if($input==$setday[$k]) $i=$k;
    if($thisDay==$setday[$k]) $j=$k;
}

$diffday = $i-$j;

$nday=7;

//echo $diffday;
if($diffday==-6)$diffday=1;
if($diffday>0) {
     $searchDate = $diffday;
    }
elseif($diffday==0 or $diffday==-6){

    $searchDate = $diffday+$nday;
}
else{

    $searchDate = $nday+$diffday;
}
$nowDate= date("Y-m-d");

echo $date = date("Y-m-d" , strtotime("+$searchDate days" , strtotime($nowDate)));

//return $date;
?>
