<?php

include_once 'header.php';
session_start();
if(!(isset($_SESSION['username']))){
  header('Location:index.php');
}
if (isset($_POST['sub']))
                {
                    $departmen = $_POST['department'];
                }

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=Departmentwise_practical_Response('.$departmen.').xls');
header("Pragma: no-cache");
header("Expires: 0");
?>

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
                                   <th>Subject-Name</th>
                              </tr>
                            </thead>";
                    //$section=$_POST['section'];
                    
                    //$lab_id=$_POST['faculty'];
                    $subject='';
                    $lab_name='';
                    $section='';
                    $year=1;
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
                       

                        while ($data1=mysqli_fetch_assoc($result1))
                        {   
                            $subject=$data1['subject'];
                            
                            
                            $section=$data1['section'];

                            $get_year = "SELECT year FROM practical_faculty_response WHERE subject='$subject'";
                            $run_year = mysqli_query($con,$get_year);
                            $data19=mysqli_fetch_assoc($run_year);
                            $year=$data19['year'];

                            $qry111="SELECT * FROM student WHERE year='$year' GROUP BY section";
                            $result111=mysqli_query($con, $qry111);
                          

                            while($run=mysqli_fetch_assoc($result111))
                            {
                                
                                
                                if($run['l1']==$subject){
                                    $prac_name=$run['p1'];
                                    break;
                                }
                                else if($run['l2']==$subject){
                                    $prac_name=$run['p2'];
                                    break;
                                }
                                else if($run['l3']==$subject){
                                    $prac_name=$run['p3'];
                                    break;
                                }
                                else if($run['l4']==$subject){
                                    $prac_name=$run['p4'];
                                    break;
                                }
                                else
                                    $prac_name='';
                            }
                            
                            $qry11="SELECT * FROM practical_faculty_response WHERE faculty_id='$faculty_id' AND subject='$subject' AND section='$section' ";
                            $result11=mysqli_query($con, $qry11);
                            
                            for ($i=0;$i<=4;$i++)
                                $arr[$faculty_id][$i]=0;
                            $count=0;
                            while ($data=mysqli_fetch_assoc($result11))
                            {
                                
                                $faculty_id=$data['faculty_id'];


                                $qry12="SELECT * FROM faculty WHERE faculty_id='$faculty_id'";
                                $result12=mysqli_query($con,$qry12);
                                while ($data12=mysqli_fetch_assoc($result12))
                                {
                                    $faculty_name=$data12['faculty_name'];
                                }

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
                                 $lab_id=$data14['la_id']."<br>";
                            
                            for ($i=0;$i<=4;$i++)
                                $arr1[$lab_id][$i]=0;
                            $count1=0;
                            while ($data13=mysqli_fetch_assoc($result13))
                            {
                                
                                


                                $qry15="SELECT * FROM lab_assistant WHERE id='$lab_id'";
                                $result15=mysqli_query($con,$qry15);
                                while ($data15=mysqli_fetch_assoc($result15))
                                {
                                    $lab_name=$data15['name'];
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
                                $count1++;
                            }
                            $sum2[$lab_id]=0;
                            for($i=0;$i<5;$i++)
                            {
                                
                                $arr1[$lab_id][$i]=$arr1[$lab_id][$i]/$count1;
                                $sum2[$lab_id]+=$arr1[$lab_id][$i];

                            }
                            $total_avg2=$sum2[$lab_id]/5;
                        
                        // lab assisteant end
                    if($sum1[$faculty_id]>0)
                    {
                    ?>


                <tbody>
                  <tr>
                  <td><?php echo $faculty_name; ?></td>
                  <td><?php echo round($total_avg1,2); ?></td>
		  <td><?php echo $lab_name; ?></td>
                    <td><?php echo round($total_avg2,2); ?></td>
                    <td><?php echo $section; ?></td>
                    <td><?php echo $subject; ?></td>
                    <td><?php echo $prac_name; ?></td>
                    
                    
                    
                  </tr>

                </tbody>
                <?php }}?>

        </table></div>

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
            var cont = document.getElementById('printAble').innerHTML;
            var original_cont = document.body.innerHTML;

            document.body.innerHTML = cont;
            window.print();
            document.body.innerHTML = original_cont;
        }
    </script>

</body>
