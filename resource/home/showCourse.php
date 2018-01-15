<?php   
       require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';


        $input = check_input($_POST['day']);
        $setday = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $setdayTH = array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์","วันอาทิตย์");
      //  $tempFindCourse = arrray('','','','','','');
        $allday = "ทุกวัน";
        $print = '[';
       






        if($input == $allday)
        {   
            $day = date("l" , strtotime("+2 days" , strtotime(date("l"))));
            for($l=0;$l<7;$l++)
            {
            if($day==$setday[$l])$countDay=$l;
            }

            for($a = 0 ; $a < 5 ; $a++ )
            {  
                $tempDate = find_date($setdayTH[$countDay]);
               $tempCourse[$a] = find_course($tempDate,$setdayTH[$countDay]);
               if($a==0)$print .= $tempCourse[$a];
               else $print.=','.$tempCourse[$a];
               $countDay++;
               if($countDay==5)$countDay=0;
            }
            $print.=']';
            echo $print;
        }
        else{
            $tempDate = find_date($input);
            $course_of_day =  find_course($tempDate,$input);
            $print .=$course_of_day.']';
            echo $print;
        }
        

        















        function find_date($dayTH){
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
        elseif($diffday==0 or $diffday==1 or $diffday==-6){ 
            if($diffday==-6)$diffday=1;
            $searchDate = $diffday+$nday;
        }
        else{ 

            $searchDate = $nday+$diffday;
        }
        $nowDate= date("Y-m-d");
       
        $date = date("Y-m-d" , strtotime("+$searchDate days" , strtotime($nowDate)));

        return $date;
        }


       


        function find_course($date,$dayTH){
        $result = "SELECT c.subject,c.course_id,t.teacher_id,t.title,t.firstname,t.lastname,t.nickname,c.topic,DATE_FORMAT(c.start_time,'%H:%i') start_time,DATE_FORMAT(c.end_time,'%H:%i') end_time,date(c.start_time)cdate,c.room,t.image,avgStar.star,c.max_seat-seat.countSeat as seatLeft,c.max_seat
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
        AND date(c.start_time)= '$date'
        AND seat.course_id = c.course_id
        ORDER BY c.subject,t.teacher_id;";
        
        
        $sql=query($result);
     

        $day = date("l" , strtotime($date));


       // $outp = array();
        $listSubject = array('MTH102','MTH112','PHY102','PHY104','CHM103');

        $jsonSubject = array('',
                             '"MTH112":[',
                             '"PHY102":[',
                             '"PHY104":[',
                             '"CHM103":[');
        $jsonSubject[0] .= '"date":"'.$date
                                       .'"'
                                       .',"day":"'.$dayTH
                                       .'"'
                                       .',"MTH102":[';
        $count = array(0,0,0,0,0);
        $temp = array('','','','','');
       

    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {   

            for($run=0;$run<count($listSubject);$run++)
            {
                 if($rs['subject']==$listSubject[$run])
            {
               // if($count1[0]!=0)$MTH102.=",";
                 if($count[$run]==0)
                 {

                 $jsonSubject[$run].='{'
                        .'"teacher_id":"'.$rs['teacher_id'].'"'   
                        .',"title":"'.$rs['title'].'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"nickname":"'.$rs['nickname'].'"'
                        .',"img":"'.$rs['image'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":[{'
                                 .'"course_id":"'.$rs['course_id'].'"'
                                 .',"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"time":"'.$rs['start_time'].'-'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $count[$run]++;
                    $temp[$run]=$rs['teacher_id'];

                }
                elseif($count[$run]!=0 and $temp[$run]==$rs['teacher_id'])
                {
                   $jsonSubject[$run].=',{'
                                  .'"course_id":"'.$rs['course_id'] .'"'
                                 .',"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"time":"'.$rs['start_time'].'-'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';

                }
                elseif($temp[$run]!=$rs['teacher_id'])
                {   
                         $jsonSubject[$run].=']}'
                        .',{"teacher_id":"'.$rs['teacher_id'].'"'
                        .',"title":"'.$rs['title'] .'"'
                        .',"firstname":"'.$rs['firstname'].'"'
                        .',"lastname":"'.$rs['lastname'].'"'
                        .',"nickname":"'.$rs['nickname'].'"'
                        .',"img":"'.$rs['image'].'"'
                        .',"star":"'.$rs['star'].'"'
                        .',"course":['
                                 .'{"course_id":"'.$rs['course_id'] .'"'
                                 .',"topic":"'.$rs['topic'].'"'
                                 .',"room":"'.$rs['room'].'"'
                                 .',"time":"'.$rs['start_time'].'-'.$rs['end_time'].'"'
                                 .',"seatLeft":"'.$rs['seatLeft'].'"'
                                 .',"max_seat":"'.$rs['max_seat'].'"'
                                 .'}';
                    $temp[$run]=$rs['teacher_id'];


                }

            }


            }

            //========================
        }
        $final = '{';
        for($m = 0 ; $m < count($listSubject) ; $m++){
             if($count[$m]!=0) $jsonSubject[$m] .= ']}]';
             else  $jsonSubject[$m] .= "]";
             if($m!=0)$final.=',';
             $final.=$jsonSubject[$m];
        }
        $final .= '}';

         mysqli_free_result($sql);
        return $final;
        
    }



?>
