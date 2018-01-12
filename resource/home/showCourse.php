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

        SELECT c.subject,t.teacher_id,t.title,t.firstname,t.lastname,c.topic,c.start_time,c.end_time,c.room,t.image,avgStar.star,c.max_seat-seat.countSeat as seatLeft,c.max_seat
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
        $MTH102 = '"MTH102":['; $count1=0; $temp1="";
        $MTH112 = '"MTH112":['; $count2=0; $temp2="";
        $PHY102 = '"PHY102":['; $count3=0; $temp3="";
        $PHY104 = '"PHY104":[';  $count4=0; $temp4="";
        $CHM103 = '"CHM103":['; $count5=0; $temp5="";

        while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {   
            if($rs['subject']==$listSubject[0])
            {
               // if($count1[0]!=0)$MTH102.=",";
                 if($count1==0)
                 {

                 $MTH102.='{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $count1++;
                    $temp1=$rs['teacher_id'];

                }
                elseif($count1!=0 and $temp1==$rs['teacher_id'])
                {
                    $MTH102.=',{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';

                }
                elseif($temp1!=$rs['teacher_id'])
                {   
                         $MTH102.=']}'
                        .'{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['
                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $temp1=$rs['teacher_id'];


                }

            }



            //=============================
            if($rs['subject']==$listSubject[1])
            {
               // if($count2[0]!=0)$MTH112.=",";
                 if($count2==0)
                 {

                 $MTH112.='{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $count2++;
                    $temp2=$rs['teacher_id'];

                }
                elseif($count2!=0 and $temp2==$rs['teacher_id'])
                {
                    $MTH112.=',{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';

                }
                elseif($temp2!=$rs['teacher_id'])
                {   
                         $MTH112.=']}'
                        .'{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $temp2=$rs['teacher_id'];


                }
            }




           // ==========================================

            if($rs['subject']==$listSubject[2])
            {
               // if($count3[0]!=0)$PHY102.=",";
                 if($count3==0)
                 {

                 $PHY102.='{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $count3++;
                    $temp3=$rs['teacher_id'];

                }
                elseif($count3!=0 and $temp3==$rs['teacher_id'])
                {
                    $PHY102.=',{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';

                }
                elseif($temp3!=$rs['teacher_id'])
                {   
                         $PHY102.=']}'
                        .'{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $temp3=$rs['teacher_id'];


                }
            }
            //=========================

            if($rs['subject']==$listSubject[3])
            {
               // if($count4[0]!=0)$PHY104.=",";
                 if($count4==0)
                 {

                 $PHY104.='{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $count4++;
                    $temp4=$rs['teacher_id'];

                }
                elseif($count4!=0 and $temp4==$rs['teacher_id'])
                {
                    $PHY104.=',{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';

                }
                elseif($temp4!=$rs['teacher_id'])
                {   
                         $PHY104.=']}'
                        .'{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $temp4=$rs['teacher_id'];


                }
            }

            ///=====================================================
            if($rs['subject']==$listSubject[4])
            {
               // if($count5[0]!=0)$CHM103.=",";
                 if($count5==0)
                 {

                 $CHM103.='{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $count5++;
                    $temp5=$rs['teacher_id'];

                }
                elseif($count5!=0 and $temp5==$rs['teacher_id'])
                {
                    $CHM103.=',{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';

                }
                elseif($temp5!=$rs['teacher_id'])
                {   
                         $CHM103.=']}'
                        .'{"title":"'.$rs['title'] .'"'
                        .',"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['

                                 .'{"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $temp5=$rs['teacher_id'];


                }
            }
            //========================
        }
        if($count1!=0) $MTH102 .= "]}]";
        else  $MTH102 .= "]";

        if($count2!=0) $MTH112 .= "]}]";
         else  $MTH112 .= "]";

        if($count3!=0) $PHY102 .= "]}]";
         else  $PHY102 .= "]";

        if($count4!=0) $PHY104 .= "]}]";
        else  $PHY104 .= "]";

        if($count5!=0) $CHM103 .= "]}]";
        else  $CHM103 .= "]";

        echo '[{'.$MTH102.','.$MTH112.','.$PHY102.','.$PHY104.','.$CHM103.'}]';
        
        // $MTH112 .= "]";
        // $PHY102 .= "]";
        // $CHM103 .= "]";

        // echo json_encode($outp,JSON_UNESCAPED_UNICODE);
        // mysqli_close($con);

?>
