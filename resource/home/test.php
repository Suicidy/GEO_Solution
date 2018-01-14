<?php   

$dayTH = 'วันจันทร์';
        $thisDay = date("l");
        $setday = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $setdayTH = array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์","วันอาทิตย์");


        for($l=0;$l<7;$l++){
            if($dayTH==$setdayTH[$l])$input=$setday[$l];
        }
   
        for($k = 0 ; $k < 7 ; $k++){
            if($input==$setday[$k]) $i=$k;
            if($thisDay==$setday[$k]) $j=$k;
        }
        
        $diffday = $i-$j;
   
        $nday=7;
       
        if($diffday>1) {
             $searchDate = $diffday;
            }
        elseif($diffday==0 or $diffday==1){ 
         
            $searchDate = $diffday+$nday;
        }
        else{ 

            $searchDate = $nday+$diffday;
        }
        $nowDate= date("Y-m-d");
       
        $date = date("Y-m-d" , strtotime("+$searchDate days" , strtotime($nowDate)));
        echo $diffday.'<br>';
        echo $date;
        
?>
