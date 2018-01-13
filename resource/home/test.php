<?php   

   
    $day = date("l" , strtotime("+2 days" , strtotime(date("l"))));
    echo $day;
?>
