 <?php

include_once 'header.php';
session_start();
if(!(isset($_SESSION['username']))){
  header('Location:index.php');
}
?>
<style>
    @media print {
    .noPrint {
        display:none;
      }
    }
</style>
<body>




    <nav class="teal lighten-3 noPrint">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Feedback Report </a>
        <ul id="nav-mobile" class="left ">
                    <li><a href="logout.php" class="right"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                   
          <li class="tab"><a href="admin_home.php"><b>Admin home</b></a></li>
        </ul>
                
      </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="container">
            <div class="container">

                <form method="post" action="#">
                    <div class="row noPrint">
                            <div class="row">
                                <div class="input-field col s12">
                                    <?php
                                    $qry1="SELECT DISTINCT department FROM faculty";
                                    $result1=mysqli_query($con, $qry1);
                                    ?>
                                    <select id="department" name="department" required>
                                        <option value="" disabled selected>Select Branch</option>
                                        <?php
                                        while ($department=mysqli_fetch_assoc($result1))
                                        {
                                            ?>
                                            <option><?php echo $department['department']; ?></option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class='input-field col s12'>
                                    <select id="faculty" name="faculty" required>
                                        <option value="" disabled selected>Select Faculty</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select id="subject" name="subject" required>
                                        <option value="" disabled selected>Select Subject</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select id="section" name="section" required>
                                        <option value="" disabled selected>Select Section</option>

                                    </select>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="input-field col s12 center">
                                    <button type="submit" name="sub" class="waves-effect waves-light btn red">button</button>
                                </div>
                            </div>



                    </div>
                </form>
                <?php
                if (isset($_POST['sub']))
                {
                        $depart=$_POST['department'];
                          echo "<div id = 'printAble'>
                          <center><b>AJAY KUMAR GARG ENGINEERING COLLEGE<center><br>
                          DEPARTMENT OF ".$depart."<br>
                          FEEDBACK
                          </b><br>SESSION 2017-18 <table class='striped centered'>
                            <thead>
                              <tr>
                                  <th>Faculty Name</th>
                                  <th>Faculty Average Response</th>
                                  <th>Assistant name</th>
                                  <th>Average</th>
                                  <th>Section</th>
                                  <th>Practical-Code</th>
                                  <th>Practical name</th>
                                  <th class='noPrint'> <input type='checkbox' id='select-all-check' class='filled-in'> 
                                        <label for='select-all-check'> Select All
                                        </label>
                                  </th>
                                  
                                  
                              </tr>
                            </thead>";
                    //$section=$_POST['section'];
                    
                    //$lab_id=$_POST['faculty'];
                    $subject='';
                    $lab_name='';
                    $section='';
                    $year=1;
                    $p=0;
$i1=0;
                    $arr=array(array());
                            $sum1=array();
                    $qryf="SELECT * FROM faculty WHERE department='$depart'";
                    $qry_execute=mysqli_query($con, $qryf);
                    while($fac_data=mysqli_fetch_array($qry_execute))
                    {
                          $faculty_name=$fac_data['name'];
                          $faculty_id=$fac_data['id'];
                        //$subject=$_POST['subject'];
                        $qry1="SELECT DISTINCT subject,section FROM practical_faculty_response WHERE faculty_id='$faculty_id' ORDER BY subject ASC";
                        $result1=mysqli_query($con, $qry1);
                        while ($data1 =mysqli_fetch_assoc($result1))
                        {   
                            //echo $faculty_id."<br>";
                           $subject=$data1['subject'];
                            $get_year = "SELECT year FROM practical_faculty_response WHERE subject='$subject'";
                            $run_year = mysqli_query($con,$get_year);
                            $data19=mysqli_fetch_assoc($run_year);
                            $year=$data19['year'];
                            //echo $data1['year'];
                            $section=$data1['section'];
                            
                            $qry11="SELECT * FROM practical_faculty_response WHERE faculty_id='$faculty_id' AND subject='$subject' AND section='$section' ";
                            $result11=mysqli_query($con, $qry11);
                            
                            for ($i=0;$i<=4;$i++)
                                $arr[$faculty_id][$i]=0;
                            $count=0;
                            $qry111="SELECT * FROM student WHERE year='$year' GROUP BY section";
                            $result111=mysqli_query($con, $qry111);
                          

                            while($run=mysqli_fetch_assoc($result111))
                            {
                                
                                
                                if($run['l1']==$subject){
                                    $prac_name=$run['p1'];
                                    $p=0;
                                    break;
                                }
                                else if($run['l2']==$subject){
                                    $prac_name=$run['p2'];
                                    $p=0;
                                    break;
                                }
                                else if($run['l3']==$subject){
                                    $prac_name=$run['p3'];
                                    $p=0;
                                    break;
                                }
                                else if($run['l4']==$subject){
                                    $prac_name=$run['p4'];
                                    $p=4;
                                    break;
                                }
                                else
                                    $prac_name='';
                            }

                            while ($data=mysqli_fetch_assoc($result11))
                            {
                                $la_count=0;
                                
                                $faculty_id=$data['faculty_id'];


                                $qry12="SELECT * FROM faculty WHERE faculty_id='$faculty_id'";
                                $result12=mysqli_query($con,$qry12);
                                while ($data12=mysqli_fetch_assoc($result12))
                                {
                                    $faculty_name=$data12['faculty_name'];
                                }
                                 $year = $data['year'];
                                $arr[$faculty_id][0]=$arr[$faculty_id][0]+$data['q1'];
                                $arr[$faculty_id][1]=$arr[$faculty_id][1]+$data['q2'];
                                $arr[$faculty_id][2]=$arr[$faculty_id][2]+$data['q3'];
                                $arr[$faculty_id][3]=$arr[$faculty_id][3]+$data['q4'];
                                $arr[$faculty_id][4]=$arr[$faculty_id][4]+$data['q5'];
                                /*$arr[5]=$arr[5]+$data['q6'];
                                $arr[6]=$arr[6]+$data['q7'];
                                $arr[7]=$arr[7]+$data['q8'];
                                $arr[8]=$arr[8]+$data['q9'];
                                $arr[9]=$arr[9]+$data['q10'];*/
                                $count++;
                            }
                            $sum1[$faculty_id]=0;
                            for($i=0;$i<5;$i++)
                            {
                                
                                $arr[$faculty_id][$i]=$arr[$faculty_id][$i]/$count;
                                $sum1[$faculty_id]+=$arr[$faculty_id][$i];

                            }
                            $total_avg1=$sum1[$faculty_id]/5;
                        }
                        // for lab assistant
                                                                        
                            $qry13="SELECT * FROM practical_lab_assistant_response WHERE subject='$subject' AND section='$section' ";
                            $result13=mysqli_query($con, $qry13);
                            $qry14="SELECT DISTINCT la_id FROM practical_lab_assistant_response WHERE subject='$subject' AND section='$section' ";
                            $result14=mysqli_query($con, $qry14);
                            while ($data14=mysqli_fetch_assoc($result14))
                                 $lab_id=$data14['la_id'];
                            
                            for ($i=0;$i<=4;$i++)
                                $arr1[$lab_id][$i]=0;
                            $q = "SELECT * FROM lab_assistant";
                            $r = mysqli_query($con, $q);
                            while($ro = mysqli_fetch_assoc($r))
                                $count1[$row['id']]=0;
                            $h=0;
                            while ($data13=mysqli_fetch_assoc($result13))
                            {   
                                $h++;
                                $lab_id=$data13['la_id'];
                                $lab_id2[$h]=$lab_id;
                                //echo $lab_id;


                                $qry15="SELECT * FROM lab_assistant WHERE id='$lab_id'";
                                $result15=mysqli_query($con,$qry15);
                                while ($data15=mysqli_fetch_assoc($result15))
                                {
                                    $lab_name[$lab_id]=$data15['name'];
                                }

                                $arr1[$lab_id][0]=$arr1[$lab_id][0]+$data13['q1'];
                                $arr1[$lab_id][1]=$arr1[$lab_id][1]+$data13['q2'];
                                $arr1[$lab_id][2]=$arr1[$lab_id][2]+$data13['q3'];
                                $arr1[$lab_id][3]=$arr1[$lab_id][3]+$data13['q4'];
                                $arr1[$lab_id][4]=$arr1[$lab_id][4]+$data13['q5'];
                                /*$arr[5]=$arr[5]+$data['q6'];
                                $arr[6]=$arr[6]+$data['q7'];
                                $arr[7]=$arr[7]+$data['q8'];
                                $arr[8]=$arr[8]+$data['q9'];
                                $arr[9]=$arr[9]+$data['q10'];*/
                                // if($lab_id==23 )
                                //     echo $data13['student_id']."&nbsp&nbsp&nbsp".$count1[$lab_id]."<br>";
                                $count1[$lab_id]++;
                            }

                            $qry19="SELECT DISTINCT(la_id) FROM practical_lab_assistant_response WHERE subject='$subject' AND section='$section' ";
                            $result19=mysqli_query($con, $qry19);
                            $la_count=0;

                            while ($data19=mysqli_fetch_assoc($result19))
                            {
                                $lab_id=$data19['la_id'];
                                
                                    
                                $sum2[$lab_id]=0;
                                for($i=0;$i<5;$i++)
                                {
                                         
                                    $arr1[$lab_id][$i]=$arr1[$lab_id][$i]/$count1[$lab_id];
                                    
                                    $sum2[$lab_id]+=$arr1[$lab_id][$i];

                                }
                               $la_count++;
                               
                                $total_avg2[$lab_id]=$sum2[$lab_id]/5;
                                //$total_avg2[$lab_id];
                        }

                        // lab assisteant end
                    if($sum1[$faculty_id]>0)
                    {
                        $avg1=round($total_avg1,2);
                        for($k=1;$k<=$la_count;$k++){
                            //echo $count1[$lab_id]."<br>";
                            $i1++;                        
                            $avg2=round($total_avg2[$lab_id2[$k]],2);
                            //$total_avg2[$lab_id2[$k]]=0;
                    ?>


                <tbody>
                  <?php echo "<tr class='noPrint dont_print' id='row".$i1."'>" ?>
                  <td><?php echo $faculty_name; ?></td>
                  <?php 
                    echo"<td><a href='complete.php?fac_id=$faculty_id&sub_id=$subject&section=$section&year=$year&type=practical&depart=$depart' class='avg'>$avg1</a></td>"; 
                  ?>
                  
                    <td><?php echo $lab_name[$lab_id2[$k]]; ?></td>
                    <?php 
                        echo"<td><a href='complete.php?fac_id=$lab_id2[$k]&sub_id=$subject&section=$section&year=$year&type=practical_assistant&depart=$depart' class='avg'>$avg2</a></td>"; 
                    ?>
                    
                    
                    <td><?php echo $section; ?></td>
                    <td><?php echo $subject; ?></td>
                    <td><?php echo $prac_name; ?></td>
<td class="noPrint dont_print"><input type="checkbox" id='<?php echo $i1;?>' class="filled-in chkbox" name="lab_ass" />
                                <label for='<?php echo $i1;?>'></label></td>
                    
                    
                  </tr>

                </tbody>
                <?php 
                
                }
                }
                $count1[$lab_id]=0;}?>

        </table></div><button onclick="prnt()" class="btn btn-large noPrint">Print</button>
        <form action="practical_1save.php" method="POST">
                    <input type="hidden" name="department" value="<?php  echo $depart; ?>">
                    <button type="submit" name="sub" class="btn btn-large noPrint">Save</button>

                </form>
        <br><br><br>

                    <canvas id="myChart" width="400" height="400"></canvas>
                    <script>
                        function generateGraph() {
                            var ctx = document.getElementById("myChart");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ["Qus-1", "Qus-2", "Qus-3", "Qus-4", "Qus-5"],
                                    datasets: [{
                                        label: 'Qus Average #',
                                         data: ['<?php echo $arr[0];?>','<?php echo $arr[1];?>','<?php echo $arr[2];?>','<?php echo $arr[3];?>','<?php echo $arr[4];?>'],
//                                        data: ['10','20','15','20','30'],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                        }
                        generateGraph();
                        window.facid='<?php echo $lab_id;?>';
                    </script>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<script type="text/javascript">
        $(document).ready(function(){
            $(".dont_print").addClass("noPrint");
        });
        $(document).ready(function(){
            $('#select-all-check').click(function() {
                $("input.chkbox").click();
                $("input.chkbox").attr("checked","checked");
            });
        });
        
        $(":checkbox").on({
                click :function(){
                    // if($("#select_all").prop("checked")==true){
                    //     $(this).prop('checked',true);
                    // }
                    if($(this).prop("checked")==true){
                        $(this).closest("tr").removeClass("noPrint");
                    }
                    else {
                        $(this).closest("tr").addClass("noPrint");
                    }
                }
        });
    </script>
    <script>


        $(document).ready(function() {
            $("#department").change(function () {
                var department = $("#department").val();
                $.ajax({
                    url: "getfac.php",
                    data: {dpt: department},
                    success: function (json) {
                        $.each(json, function (i, obj) {
                            $('#faculty').append($('<option>', {
                                value: obj.id,
                                text : obj.name
                            }));
                        });
                        $('select').material_select();
                    }
                });
            });
            $("#faculty").change(function () {
                var fac = $("#faculty").val();
                $.ajax({
                    url: "getsub_prac.php",
                    data: {fac: fac},
                    success: function (json) {
                        $.each(json, function (i, obj) {
                            $('#subject').append($('<option>', {
                                value: obj.subject,
                                text : obj.subject
                            }));
                        });
                        $('select').material_select();
                    }
                });
            });
            $("#subject").change(function () {
                var sub = $("#subject").val();
                var fac = $("#faculty").val();
                $.ajax({
                    url: "getsec_prac.php",
                    data: {fac: fac, sub: sub},
                    success: function (json) {
                        $.each(json, function (i, obj) {
                            $('#section').append($('<option>', {
                                value: obj.section,
                                text : obj.section
                            }));
                        });
                        $('select').material_select();
                    }
                });
            });
        });
        function prnt(){
           window.print();
        }
    </script>
    


</body>
