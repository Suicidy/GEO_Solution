    <?php
       require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';

       date_default_timezone_set("Asia/Bangkok");


       session_start();


        $input = check_input($_POST['day']);
        $subject = check_input($_POST['subject']);
        $setday = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $setdayTH = array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์","วันอาทิตย์");
      //  $tempFindCourse = arrray('','','','','','');
        $allday = "ทุกวัน";
        $print = '[';


        if($input == $allday)
        {
            $day = date("l" , strtotime("+1 days" , strtotime(date("l"))));
           // echo $day;
            for($l=0;$l<7;$l++)
            {
                if($day==$setday[$l])$countDay=$l;
            }

            if($countDay!=5 and $countDay!=6){
                 for($a = 0 ; $a < 5 ; $a++ )
                 {
                      $tempDate = find_date($setdayTH[$countDay]);
                      $tempCourse[$a] = find_course($tempDate,$setdayTH[$countDay],$subject);
                      if($a==0)$print .= $tempCourse[$a];
                      else $print.=','.$tempCourse[$a];
                      $countDay++;
                      if($countDay==5)$countDay=0;
            }
            $print.=']';
            echo $print;


            }
            else{
                for($a = 0 ; $a < 5 ; $a++ )
                 {
                      $tempDate = find_date($setdayTH[$a]);
                      $tempCourse[$a] = find_course($tempDate,$setdayTH[$a],$subject);
                      if($a==0)$print .= $tempCourse[$a];
                      else $print.=','.$tempCourse[$a];
            }
            $print.=']';
            echo $print;

          }

        }
        else{
            if($input!= $setdayTH[5] and $input!=$setdayTH[6]){
                $tempDate = find_date($input);
                $course_of_day =  find_course($tempDate,$input,$subject);
                $print .=$course_of_day.']';
                 echo $print;
           }
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


          if($diffday==-6)$diffday=1;
          if($diffday>0) {
               $searchDate = $diffday;
              }
          elseif($diffday==0){

              $searchDate = $diffday+$nday;
          }
          else{

              $searchDate = $nday+$diffday;
          }
          $nowDate= date("Y-m-d");

          $date = date("Y-m-d" , strtotime("+$searchDate days" , strtotime($nowDate)));

          return $date;
        }





        function find_course($date,$dayTH,$subject){

        if(check_show_course()==0){
        $result = "SELECT c.subject,c.course_id,t.teacher_id,t.title,t.firstname,t.lastname,t.nickname,t.facebook,t.line,c.topic,DATE_FORMAT(c.start_time,'%H:%i') start_time,DATE_FORMAT(c.end_time,'%H:%i') end_time,date(c.start_time)cdate,c.room,t.image,t.star,c.max_seat-seat.countSeat as seatLeft,c.max_seat
        FROM course c,teacher t  ,(SELECT course.course_id , count(assign_course.course_id) AS countSeat
                                  FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
                                  GROUP BY course_id) seat

        WHERE  c.teacher_id = t.teacher_id
        AND date(c.start_time)= '$date'
        AND seat.course_id = c.course_id
        AND c.subject = '$subject'
        ORDER BY c.subject,t.teacher_id;";
        }
        elseif(check_show_course()==1){
            $username = $_SESSION['username'];

            $result = "SELECT c.subject,c.course_id,t.teacher_id,t.title,t.firstname,t.lastname,t.nickname,t.facebook,t.line,c.topic,DATE_FORMAT(c.start_time,'%H:%i') start_time,DATE_FORMAT(c.end_time,'%H:%i') end_time,date(c.start_time)cdate,c.room,t.image,t.star,c.max_seat-seat.countSeat as seatLeft,c.max_seat
                        FROM course c,teacher t  ,(SELECT course.course_id , count(assign_course.course_id) AS countSeat
                                                  FROM assign_course RIGHT JOIN course ON assign_course.course_id = course.course_id
                                                  GROUP BY course_id) seat

        WHERE c.course_id NOT IN (SELECT course.course_id
                                FROM course
                                  WHERE course.course_id IN (SELECT ac.course_id
                                                            FROM assign_course ac
                                                            WHERE ac.student_id = '$username'))
        AND c.teacher_id = t.teacher_id
        AND date(c.start_time)= '$date'
        AND seat.course_id = c.course_id
        AND c.subject = '$subject'
        ORDER BY c.subject,t.teacher_id;";
        }




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
                            .',"facebook":"'.$rs['facebook'].'"'
                            .',"line":"'.$rs['line'].'"'
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
                        .',"facebook":"'.$rs['facebook'].'"'
                        .',"line":"'.$rs['line'].'"'
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



function check_show_course(){
        if(isset( $_SESSION['username']) and isset($_SESSION['userview']))
        {
          if($_SESSION['userview']=='student')
          {
            return 1;
          }

        }
       // echo 'id:'.$_SESSION['username'].'type'.$_SESSION['userview'];
        return 0;

      }

function check_overlay($courseid,$studentid){
  // $courseid = 5;
  // $studentid = 58070501090;
  //$comment = check_input($_POST['comment']);
  $sql = query("SELECT date(start_time) date ,time(start_time) start_time , time(end_time) end_time
          FROM course
          WHERE course_id = $courseid;");
    // $x= array();
  while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {
          $date_book = $rs['date'];
          $start_time = $rs['start_time'];
          $end_time = $rs['end_time'];
        }
          echo $date_book.'<br>';
          echo $start_time.'<br>';
          echo $end_time.'<br>';

$command = "SELECT assign_course.student_id,date(start_time) date ,time(start_time) start_time , time(end_time) end_time
              FROM assign_course JOIN course ON assign_course.course_id = course.course_id
              WHERE assign_course.student_id=$studentid and date(course.start_time) = '$date_book'";

              echo $command.'<br>';
$sql = query($command);
//echo $sql;
$time_overlay=0;
    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
        {
            echo strtotime($rs['start_time']).'<br>';
            echo strtotime($rs['end_time']).'<br>';
            if(!((strtotime($rs['start_time'])>strtotime($end_time) and strtotime($rs['end_time'])>strtotime($end_time))
                  or (strtotime($rs['start_time'])<strtotime($start_time) and strtotime($rs['end_time']<strtotime($start_time))))){
              echo '0';
              return 0;
            }
        }
        echo '1';
return 1;

}
