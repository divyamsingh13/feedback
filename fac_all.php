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
    }</style>
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
    



                    
                <?php
                
                          echo "<div id = 'printAble'>
                          <center><h5><b>AJAY KUMAR GARG ENGINEERING COLLEGE<center><br>
                          <br>
                          (FEEDBACK)</h5></b><br>
                          

                    <table class='striped centered'>
                            <thead>
                              <tr>
                                  <th>Faculty Name</th>
                                  <th>Section</th>
                                  <th>Subject-Code</th>
                                  <th>BRANCH</th>
                                  <th>Section- 'A' Average Response</th>
                                  <th>Section- 'B' Average Response</th>
                                  <th class='noPrint'> <input type='checkbox' id='select-all-check' class='filled-in'> 
                                        <label for='select-all-check'> Select All
                                        </label>
                                  </th>
                              </tr>
                            </thead>";
                    //$section=$_POST['section'];
                    //$depart=$_POST['department'];
                    
                    //$faculty_id=$_POST['faculty'];
                    $year=1;
                    $qryf="SELECT * FROM faculty";
                    $qry_execute=mysqli_query($con, $qryf);
                    $bk=0;
                    $i1=0;

                    //echo mysqli_num_rows($qry_execute);;
                    while($fac_data=mysqli_fetch_array($qry_execute))
                    {


                         $depart=$fac_data['department'];
                        $faculty_name=$fac_data['name'];
                         $faculty_id=$fac_data['id'];
                        //$subject=$_POST['subject'];
                        $qry1="SELECT DISTINCT subject,section FROM theory_response WHERE faculty_id='$faculty_id' ORDER BY subject ASC";
                        $result1=mysqli_query($con, $qry1);
                        //echo mysqli_error();
                        //echo $result1->num_rows();
                        
                        while ($data1=mysqli_fetch_assoc($result1))
                        {
                            $subject=$data1['subject'];
                            $section=$data1['section'];
                            
                            $qry11="SELECT * FROM theory_response WHERE faculty_id='$faculty_id' AND subject='$subject' AND section='$section' ";
                            $result11=mysqli_query($con, $qry11);
                            $arr=[0,0,0,0,0,0,0,0,0,0];

                            $count=0;
                            while ($data=mysqli_fetch_assoc($result11))
                            {
                                $year = $data['year'];
                                $arr[0]=$arr[0]+$data['q1'];
                                $arr[1]=$arr[1]+$data['q2'];
                                $arr[2]=$arr[2]+$data['q3'];
                                $arr[3]=$arr[3]+$data['q4'];
                                $arr[4]=$arr[4]+$data['q5'];
                                $arr[5]=$arr[5]+$data['q6'];
                                $arr[6]=$arr[6]+$data['q7'];
                                $arr[7]=$arr[7]+$data['q8'];
                                $arr[8]=$arr[8]+$data['q9'];
                                $arr[9]=$arr[9]+$data['q10'];
                                $count++;
                            }
                            $sum1=0;
                            for($i=0;$i<5;$i++)
                            {
                                
                                $arr[$i]=$arr[$i]/$count;
                                $sum1+=$arr[$i];
                            }
                            $total_avg1=$sum1/5;

                            if($year==1)
                            {
                              $i=5;
                              $max=5;
                            }


                            else 
                            {
                              $max=4;
                              $i=6;
                            }
                            $sum2=0;
                            for(;$i<=9;$i++)
                            {
                              $sum2+=$arr[$i];
                                //$arr[$i]*=100;
                            }
                            //$total_avg2=$sum2/$max;
                            $total_avg2=$sum2/$count;
                            $avg1 = round($total_avg1,2);

                            $i1++;
                        ?>  

                            <tbody>
                              <?php echo "<tr class='noPrint dont_print' id='row".$i1."'>" ?>
                                <td><?php echo $faculty_name; ?></td>
                                <td><?php echo $section; ?></td>
                                <td><?php echo $subject; ?></td>
                                <td><?php echo $depart; ?></td>
                                <?php 
                                    echo"<td><a href='complete.php?fac_id=$faculty_id&sub_id=$subject&section=$section&year=$year&type=theory'>$avg1</a></td>"; 
                                    ?>
                                <td><?php echo round($total_avg2,2) ; ?></td>
                                <td class="noPrint dont_print"><input type="checkbox" id='<?php echo $i1;?>' class="filled-in chkbox" name="lab_ass" />
                                <label for='<?php echo $i1;?>'></label></td>
                              </tr>

                        </tbody>
                        <?php } }?>



                

        </table></div><button onclick="window.print();" class="btn btn-large noPrint">Print</button>
        <br><br><br>
        <form action="fac_all_save.php" method="POST">
                    <input type="hidden" name="department" value="<?php  echo $depart; ?>">
                    <button type="submit" name="sub" class="btn btn-large noPrint">Save</button>

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
            window.print();
        }
    </script>

</body>
