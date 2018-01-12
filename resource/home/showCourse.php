<?php   
       
        
        $thisDay = date("l");
        $setday = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $setdayTH = array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์","วันอาทิตย์");
        for($l=0;$l<7;$l++){
            if($_POST['day']==$setdayTH[$l])$input=$setday[$l];
        }
        if($input==date("l")){
            echo 'It is the same day';
        }
        for($k=0 ; $k<7;$k++){
            if($input==$setday[$k]) $i=$k;
            if($thisDay==$setday[$k]) $j=$k;
        }
        
        $diffday = $i-$j;
   
        $nday=7;
       
        if($diffday>0) {
      
             $searchDate = $diffday;
            }
        elseif($diffday==0){ 
         
            $searchDate = $nday;
        }
        else{ 

            $searchDate = $nday+$diffday;
        }
        $nowDate= date("Y-m-d");
       
        $date = date("Y-m-d" , strtotime("+$searchDate days" , strtotime($nowDate)));
        
        $con = new mysqli("localhost", "root", "", "geo_db");
        if ($con->connect_errno) {
            die( "Failed to connect to MySQL : (" . $con->connect_errno . ") " . $con->connect_error);
        }
        mysqli_set_charset( $con, 'utf8');
        $sql=mysqli_query($con,"

        SELECT c.subject,t.title,t.firstname,t.lastname,c.topic,c.start_time,c.end_time,c.room,t.image,avgStar.star,c.max_seat-seat.countSeat as seatLeft,c.max_seat
        FROM course c,teacher t   , (SELECT AVG(assign_course.star) AS star ,teacher.teacher_id as teacherid
                                  FROM assign_course, course , teacher 
                                  where course.teacher_id = teacher.teacher_id 
                                        AND assign_course.course_id=course.course_id
                                  GROUP BY teacher.teacher_id) avgStar,
                             (SELECT course.course_id , count(assign_course.course_id) AS countSeat
                                   FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
                                   GROUP BY course_id) seat
                                   
        WHERE c.teacher_id = t.teacher_id
        AND t.teacher_id = avgStar.teacherid
        AND date(c.start_time)='$date'
        AND seat.course_id = c.course_id
        ORDER BY c.subject,t.teacher_id
        ");
        

       // $outp = array();
        $listSubject = array('MTH102','MTH112','PHY102','PHY104','CHM103');
        $MTH102 = "MTH102:["; $count1 = array(0,0);
        $MTH112 = "MTH112:["; $count2 = array(0,0);
        $PHY102 = "PHY102:["; $count3 = array(0,0);
        $PHY104 = "PHY102:["; $count4 = array(0,0);
        $CHM103 = "CHM103:["; $count5 = array(0,0);

        while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {   
            if($rs['subject']==$listSubject[0])
            {
                if($count1[0]!=0)$MTH102.=",";
                
                $MTH102.="{title:".$rs['title'].",firstname:".$rs['lastname'].",lastname".",star:".$rs['star'].",course:[{topic:".$rs['topic'].",room:".$rs['room']
             .",start_time:".$rs['start_time'].",end_time:".$rs['end_time'].",seatLeft:".$rs['seatLeft'].",max_seat:".$rs['max_seat']
                 

            }
            
        }

        $MTH102 .= "]";
        $MTH112 .= "]";
        $PHY102 .= "]";
        $CHM103 .= "]";

        echo json_encode($outp,JSON_UNESCAPED_UNICODE);
        mysqli_close($con);

?>
