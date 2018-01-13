<?php   

    function query($date){
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
     




       // $outp = array();
        $listSubject = array('MTH102','MTH112','PHY102','PHY104','CHM103');

        $jsonSubject = array('"MTH102":[',
                             '"MTH112":[',
                             '"PHY102":[',
                             '"PHY104":[',
                             '"CHM103":[');
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
                                 .',"start_time":"'.$rs['start_time'].'"'
                                 .',"end_time":"'.$rs['end_time'].'"'
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
        $final = '[{"date":'.'"'.$date.'"';
        for($m = 0 ; $m < count($listSubject) ; $m++){
             if($count[$m]!=0) $jsonSubject[$m] .= ']}]';
             else  $jsonSubject[$m] .= "]";
             $final.=',';
             $final.=$jsonSubject[$m];
        }
        $final .= '}]';

         mysqli_free_result($sql);
        return $final;
        

       
    }
?>
