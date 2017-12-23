<?php
include_once 'header.php';
session_start();
if(!(isset($_SESSION['username']))){
  header('Location:index.php');
}
?>
<nav class="teal lighten-3">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo center">Feedback Admin Panel</a>
    <ul id="nav-mobile" class="left hide-on-med-and-down">
    </ul>
  </div>
</nav>
<div class="container" style="margin-top:100px;">
  <div class="row">
    <div class="col s6 offset-s4">
      <a href="theory_1.php" class="waves-effect waves-light btn red">
        Departmentwise Theory Response
      </a>
    </div>
  </div>
  <div class="container" style="margin-top:100px;">
  <div class="row">
    <div class="col s6 offset-s4">
      <a href="student_details.php" class="waves-effect waves-light btn red">
        View Student Details
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col s6 offset-s4">
      <a href="practical_2.php" class="waves-effect waves-light btn orange">
        Departmentwise Lab Assistant Response
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col s6 offset-s4">
      <a href="practical_1.php" class="waves-effect waves-light btn blue">
        Departmentwise Practical Response
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col s6 offset-s4">
      <a href="fac_all.php" class="waves-effect waves-light btn skyblue">
        All Faculty Response
      </a>
    </div>
  </div>
  <!-- <div class="row">
    <div class="col s6 offset-s4">
      <a href="theory_2.php" class="waves-effect waves-light btn pink">
        Departmentwise Subject Response
      </a>
    </div>
  </div> -->

</div>
