<?php
include_once 'header.php';
session_start();
if(isset($_SESSION['ses_name'])){
  header('Location:student.php');
}
?>
<style type="text/css">
  nav{
    box-shadow: none !important;
  }
    /* label color */
   .input-field label {
     color: #FFF !important; 
   }
   /* label focus color */
   .input-field input[type=text]:focus + label {
     color: #fff !important;
   }
   .input-field input[type=text]{
     border-bottom: 1px solid #fff;
     box-shadow: 0 1px 0 0 #fff;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #fff;
     box-shadow: 0 1px 0 0 #fff;
   }
</style>
<body class="green">
<a href="http://www.ossrndc.in" target="_blank"><div class="powered-by-team-oss white-text"> <span class="green-text text-lighten-4">GreenBoard</span>, Powered by Team OSS</div></a>

<div class="preloading-screen">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-green-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
            <div class="circle"></div>
        </div><div class="circle-clipper right">
            <div class="circle"></div>
        </div>
        </div>
    </div>
    <h4 class="ml-5 green-text text-darken-2">&nbsp;Student Feedback Portal 
    <!-- <i class="fa fa-calende"></i> -->
    </h4>
    <br>
    <!-- <h6>Powered by GreenBoard!</h6> -->
    <br>
    <h6 class="powered-by">Powered by Team OSS</h6>
</div>
    <nav class="green">
      <div class="nav-wrapper">
        <!-- <a href="#" class="brand-logo center">Student Feedback Portal</a> -->
        <ul id="nav-mobile" class="right ">
          <li class="tab"><a href="login_admin.php">Login Admin</a></li>
        </ul>
        <ul id="nav-mobile" class="left ">
          <li class="tab"> <a href="index.php">&nbsp; Student Feedback Portal</a></li>
        </ul>
      </div>
      
    </nav>
<div class="row">
  <div class="row"></div><div class="row"></div><div class="row"></div><div class="row"></div><div class="row"></div><div class="row"></div><div class="row"></div><div class="row"></div><div class="row"></div>
<div class="col s6 m6 l6 offset-s4 offset-l3 offset-m3">
  <div class="">
    <div class="card-content">
    <div class="row">
    <form class="col s10 offset-s2" method="post" action="student.php">
      <div class="row">
        <div class="col s12 pull-s1 white-text">
          <h4>Welcome, Students of AKGEC</h4>
        </div>
        <div class="input-field col s12 pull-s1">
          <input id="rollno" type="text" class="validate white-text" name="rollno">
          <label for="rollno">Enter your Roll No.</label>
        </div>
        <div class="input-field col s12 right-align pull-s1">
          <button type="submit" class="waves-effect waves-light btn white black-text text-darken-2" id="submit">Submit <i class='fa fa-sign-in'></i></button>
        </div>
      </div>
      <?php
      if(isset($_GET['login']) && $_GET['login']==false){
      echo '<div class="col s12 push-s2">
      <p style="color:red;">
        Roll No. does not exsist
      </p>
      </div>';
    }?>
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  <script type="text/javascript" src="assets/js/jquery.js"></script>
      <script type="text/javascript" src="assets/plugins/materialize/js/materialize.min.js"></script>
</body>
