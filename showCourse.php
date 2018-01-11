<?php   
        /*$con = new mysqli("localhost", "root", "", "geo_db");
       if ($con->connect_errno) {
            die( "Failed to connect to MySQL : (" . $con->connect_errno . ") " . $con->connect_error);
        }
        mysqli_set_charset( $con, 'utf8');
        $sql=mysqli_query($con,"SELE"CT * FROM student");
        $outp = array();
        while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {   
            $outp[] = $rs;
        }
        echo json_encode($outp,JSON_UNESCAPED_UNICODE);
        mysqli_close($con); */
       // $input = 'Thursday';

        
        $thisDay = date("l");
        $setday = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $setdayTH = array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์","วันอาทิตย์");
        for($l=0;$l<7;$l++){
            if($_POST['day']==$setdayTH[$l])$input=$setday[$l];
        }
        if($input==date("l")){
            //echo 'It is the same day';
        }
        for($k=0 ; $k<7;$k++){
            if($input==$setday[$k]) $i=$k;
            if($thisDay==$setday[$k]) $j=$k;
        }
        //echo "i = ".$i." j = ".$j."<br>";
        
        $diffday = $i-$j;
        // echo "diffdate = ".$diffday."<br>";
        $nday=7;
       
        if($diffday>0) {
            //echo "diffday > 0 <br>";
             $searchDate = $diffday;
            }
        elseif($diffday==0){ 
            //echo "diffday = 0 <br>";
            $searchDate = $nday;
        }
        else{ 
            //echo "diffday < 0 <br>";
            $searchDate = $nday+$diffday;
        }
        // echo "The time is " . date("h:i:sa <br>");
        // echo "thisDay is ".date("d")."<br>";
        // echo "diffdate = ".$diffday."<br>";
        // echo $thisDate+$diffday."<br>";  
        // echo $searchDate."<br>";
        // echo $thisDay."<br>";
        // echo $thisDate."<br>";
        // echo $thisYear."<br>";
        // echo $thisMonth."<br><br>";
        // echo strtotime("now")."<br>";

        $nowDate= date("Y-m-d");
        //$sumdate = date("Y-m-d", strtotime("+1 day"$nowDate ));
        $date = date("Y-m-d" , strtotime("+$searchDate days" , strtotime($nowDate)));
        //echo $nowDate."<br>";
        //echo $date."<br>" ;
        
        $con = new mysqli("localhost", "root", "", "geo_db");
        if ($con->connect_errno) {
            die( "Failed to connect to MySQL : (" . $con->connect_errno . ") " . $con->connect_error);
        }
        mysqli_set_charset( $con, 'utf8');
        $sql=mysqli_query($con,"SELECT * FROM course WHERE date(start_time)='$date'");
        $outp = array();
        while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {   
            $outp[] = $rs;
        }
       // $outp = $outp[0]
        echo json_encode($outp);
        mysqli_close($con);
       
        

       
?>