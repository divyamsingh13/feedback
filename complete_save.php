<?php

include_once 'header.php';
session_start();
if(!(isset($_SESSION['username']))){
  header('Location:index.php');
}

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=COMPLETE Report().xls');
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php
                $fac_id=$_GET['fac_id'];
                $section=$_GET['section'];
                $sub_id=$_GET['sub_id'];
                $year=$_GET['year'];
                $type = $_GET['type'];
                $depart=$_GET['depart'];
                $t=1;
                if ($t==1)
                {

                     //$depart=$_POST['department'];
                          echo "<div id = 'printAble'>
                          <center><h5><b>AJAY KUMAR GARG ENGINEERING COLLEGE<center><br>
                          DEPARTMENT OF $depart<br>
                          (FEEDBACK)</h5></b><br>
                          SESSION 2017-18";
                          if($type=="theory") {

                            echo "<table class='striped centered'>
                                <thead>
                                <tr>
                                      <th>ROLL NO.</th>
                                      <th>NAME</th>
                                      <th>SECTION</th>
                                      <th>Subject-Code</th>
                                      
                                      <th>Q.1</th>
                                      <th>Q.2</th>
                                      <th>Q.3</th>
                                      <th>Q.4</th>
                                      <th>Q.5</th>
                                      <th>Q.6</th>
                                      <th>Q.7</th>
                                      <th>Q.8</th>
                                      <th>Q.9</th>
                                      <th>Q.10</th>
                                      ";
                             }
                            elseif($type=='practical' || $type='practical_assistant'){
                                echo "<table class='striped centered'>
                                <thead>
                                <tr>
                                      <th>ROLL NO.</th>
                                      <th>NAME</th>
                                      <th>SECTION</th>
                                      <th>Subject-Code</th>
                                      
                                      <th>Q.1</th>
                                      <th>Q.2</th>
                                      <th>Q.3</th>
                                      <th>Q.4</th>
                                      <th>Q.5</th>
                                      
                                      ";

                            }

                           echo" </tr>
                            </thead>";
                    //$section=$_POST['section'];
                    //$depart=$_POST['department'];
                    
                    //$faculty_id=$_POST['faculty'];
                    if($type=='theory')
                    $qry1="SELECT * FROM theory_response WHERE year='$year' AND section='$section' AND faculty_id='$fac_id' AND subject='$sub_id' order by student_id asc";
                    elseif($type=='practical')
                            $qry1="SELECT * FROM practical_faculty_response WHERE year='$year' AND section='$section' AND faculty_id='$fac_id'and subject='$sub_id'  order by student_id asc";
                         elseif($type=='practical_assistant')
                            $qry1="SELECT * FROM practical_lab_assistant_response WHERE year='$year' AND section='$section' AND la_id='$fac_id' and  subject='$sub_id' order by student_id asc ";
                    $qry_execute=mysqli_query($con, $qry1);
                    echo mysqli_error($qry_execute);
                    while($fac_data=mysqli_fetch_array($qry_execute))
                    {
                       
                        $st_id = $fac_data['student_id'];
                        

                          $arr=[0,0,0,0,0,0,0,0,0,0];

                            
                            
                                
                                $arr[0]=$fac_data['q1'];
                                $arr[1]=$fac_data['q2'];
                                $arr[2]=$fac_data['q3'];
                                $arr[3]=$fac_data['q4'];
                                $arr[4]=$fac_data['q5'];
                                $arr[5]=$fac_data['q6'];
                                $arr[6]=$fac_data['q7'];
                                $arr[7]=$fac_data['q8'];
                                $arr[8]=$fac_data['q9'];
                                $arr[9]=$fac_data['q10'];

                        //$subject=$_POST['subject'];
                          //if($type=='theory')
                            $qry1="SELECT * FROM student WHERE id='$st_id'";
                        
                        $result1=mysqli_query($con, $qry1);
                        while ($data1=mysqli_fetch_assoc($result1))
                        {
                            $roll_no  = $data1['rollno'];
                          $faculty_name=$data1['name'];
                          //$faculty_id=$fac_data['id'];
                            //$subject=$data1['subject'];
                            //$section=$data1['section'];
                            
                            
                            
                          
                            
                           
                            

                         }   
                        ?>  

                            <tbody>
                              <tr>
                              <td><?php echo $roll_no; ?></td>
                                <td><?php echo $faculty_name; ?></td>
                                <td><?php echo $section; ?></td>
                                <td><?php echo $sub_id; ?></td>
                                <td><?php echo $arr[0]; ?></td>
                                <td><?php echo $arr[1]; ?></td>
                                <td><?php echo $arr[2]; ?></td>
                                <td><?php echo $arr[3]; ?></td>
                                <td><?php echo $arr[4]; ?></td>
                                <td><?php echo $arr[5]; ?></td>
                                <td><?php echo $arr[6]; ?></td>
                                <td><?php echo $arr[7]; ?></td>
                                <td><?php echo $arr[8]; ?></td>
                                <td><?php echo $arr[9]; ?></td>
                                <td><?php echo $arr[10]; ?></td>
                                
                              </tr>

                        </tbody>
                        <?php 
                    } ?>

        </table></div>
        
        <br><br><br>
        
        


       



        </form>

        

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
                        window.facid='<?php echo $faculty_id;?>';
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
                    url: "getsub.php",
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
                    url: "getsec.php",
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
