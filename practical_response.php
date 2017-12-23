<?php
require_once 'connect.inc.php';
if(isset($_POST['pq-1-f-1'])&&isset($_POST['pq-2-f-1'])&&isset($_POST['pq-3-f-1'])&&isset($_POST['pq-4-f-1'])&&isset($_POST['pq-5-f-1'])){
  $fac_1_response = array();
  $fac_2_response = array();
  $la_response = array();
  $lab_assistant_id=array();
  $i=1;
  $m=$_POST['no'];
  $faculty_1_id = $_POST['faculty_1_id'];
  $faculty_2_id = $_POST['faculty_2_id'];
  if($faculty_2_id == '')
  {
    while($i<=5){
      $fac_1_response[] = $_POST['pq-'.$i.'-f-1'];
      $i++;
    }
    $i=1;
    while($i<=5){
      $fac_2_response[] = $_POST['pq-'.$i.'-f-2'];
      $i++;
    }
    if($m>0){
      for($o=1;$o<$m;$o++){
        $i=6;
        while($i<=10){
        $la_response[$o][] = $_POST['pq'.$i.'-la'.$o];
        $i++;
        }
      }
    }
    else{
      while($i<=10){
        $la_response[] = $_POST['pq'.$i.'-la'];
        $i++;
        }

    }
    $studentid = $_POST['studentid'];
    
    if($m==0)
      $la_id = $_POST['la_id'];
    else{
      $lab_assistant_id=explode("/",$_POST['lab_assistant_id']);

    }
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $insert_faculty_1_response_sql = "insert into practical_faculty_response (`student_id`,`faculty_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$faculty_1_id','$subject','$year','$section','$fac_1_response[0]','$fac_1_response[1]','$fac_1_response[2]','$fac_1_response[3]','$fac_1_response[4]')";
    $insert_faculty_2_response_sql = "insert into practical_faculty_response (`student_id`,`faculty_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$faculty_2_id','$subject','$year','$section','$fac_2_response[0]','$fac_2_response[1]','$fac_2_response[2]','$fac_2_response[3]','$fac_2_response[4]')";
    if($m==0){
    $insert_lab_ass_response = "insert into practical_lab_assistant_response (`student_id`,`la_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$la_id','$subject','$year','$section','$la_response[0]','$la_response[1]','$la_response[2]','$la_response[3]','$la_response[4]')";
    if($con->query($insert_faculty_1_response_sql) && $con->query($insert_faculty_2_response_sql) && $con->query($insert_lab_ass_response)){
      header('Content-Type: application/json');
      print json_encode('Respose Recorded');
    }else{
      header('HTTP/1.1 500 Internal Server Error');
      header('Content-Type: application/json; charset=UTF-8');
      die(json_encode(array('message' => mysqli_error($con), 'code' => 500)));
    }
  }
  else
  {
    $con->query($insert_faculty_1_response_sql);
    $con->query($insert_faculty_2_response_sql);
    for($o=1;$o<$m;$o++){
      $la1 = $lab_assistant_id[$o-1];
      $l1=$la_response[$o][0];
      $l2=$la_response[$o][1];
      $l3=$la_response[$o][2];
      $l4=$la_response[$o][3];
      $l5=$la_response[$o][4];
    $insert_lab_ass_response = "insert into practical_lab_assistant_response (`student_id`,`la_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$la1','$subject','$year','$section','$l1','$l2','$l3','$l4','$l5')";
   if(!($con->query($insert_lab_ass_response))){
    header('HTTP/1.1 500 Internal Server Error');
      header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => mysqli_error($con), 'code' => 500)));

  }
  }
  }
}
else{
  if(isset($_POST['pq-1-f-2'])&&isset($_POST['pq-2-f-2'])&&isset($_POST['pq-3-f-2'])&&isset($_POST['pq-4-f-2'])&&isset($_POST['pq-5-f-2'])){
       while($i<=5){
      $fac_1_response[] = $_POST['pq-'.$i.'-f-1'];
      $i++;
    }
    $i=1;
    while($i<=5){
      $fac_2_response[] = $_POST['pq-'.$i.'-f-2'];
      $i++;
    }
    if($m>0){
      for($o=1;$o<$m;$o++){
        $i=6;
        while($i<=10){
        $la_response[$o][] = $_POST['pq'.$i.'-la'.$o];
        $i++;
        }
      }
    }
    else{
      while($i<=10){
        $la_response[] = $_POST['pq'.$i.'-la'];
        $i++;
        }

    }
    $studentid = $_POST['studentid'];
    
    if($m==0)
      $la_id = $_POST['la_id'];
    else{
      $lab_assistant_id=explode("/",$_POST['lab_assistant_id']);

    }
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $insert_faculty_1_response_sql = "insert into practical_faculty_response (`student_id`,`faculty_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$faculty_1_id','$subject','$year','$section','$fac_1_response[0]','$fac_1_response[1]','$fac_1_response[2]','$fac_1_response[3]','$fac_1_response[4]')";
    $insert_faculty_2_response_sql = "insert into practical_faculty_response (`student_id`,`faculty_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$faculty_2_id','$subject','$year','$section','$fac_2_response[0]','$fac_2_response[1]','$fac_2_response[2]','$fac_2_response[3]','$fac_2_response[4]')";
    if($m==0){
    $insert_lab_ass_response = "insert into practical_lab_assistant_response (`student_id`,`la_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$la_id','$subject','$year','$section','$la_response[0]','$la_response[1]','$la_response[2]','$la_response[3]','$la_response[4]')";
    if($con->query($insert_faculty_1_response_sql) && $con->query($insert_faculty_2_response_sql) && $con->query($insert_lab_ass_response)){
      header('Content-Type: application/json');
      print json_encode('Respose Recorded');
    }else{
      header('HTTP/1.1 500 Internal Server Error');
      header('Content-Type: application/json; charset=UTF-8');
      die(json_encode(array('message' => mysqli_error($con), 'code' => 500)));
    }
  }
  else
  {
    $con->query($insert_faculty_1_response_sql);
    $con->query($insert_faculty_2_response_sql);
    for($o=1;$o<$m;$o++){
      $la1 = $lab_assistant_id[$o-1];
      $l1=$la_response[$o][0];
      $l2=$la_response[$o][1];
      $l3=$la_response[$o][2];
      $l4=$la_response[$o][3];
      $l5=$la_response[$o][4];
    $insert_lab_ass_response = "insert into practical_lab_assistant_response (`student_id`,`la_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$la1','$subject','$year','$section','$l1','$l2','$l3','$l4','$l5')";
   if(!($con->query($insert_lab_ass_response))){
    header('HTTP/1.1 500 Internal Server Error');
      header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => mysqli_error($con), 'code' => 500)));

  }
  }
  }   
  }
}
}
 ?>
