<?php
require_once 'connect.inc.php';?>
<html>
<head>
<title>Student Feedback</title>

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"> -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css"> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script> -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="assets/fonts/css/font-awesome.min.css">
<script type="text/javascript" src="assets/js/jquery.js"></script>
  
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/materialize/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script type="text/javascript" src="assets/plugins/materialize/js/materialize.js"></script>

  <script type="text/javascript">
$(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal').modal();
    $('select').material_select();
  $('body').on('click',function(){
      $('select').material_select();
  })

        setTimeout(function(){
            $(".preloading-screen").fadeOut(500);
        },1000);

});
  </script>
  <style type="text/css">
  .login-form{
    position: fixed;
    top: 50%;
    left: 50%;
    /*padding-left:50%;*/
   /* display: flex;*/
    /*align-items: center;*/
    /*justify-content: center;*/
  }
  .preloading-screen{
    position:fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    background: #fff;
    z-index: 9999;
}
.powered-by{
    position: absolute;
    bottom: 10px;
    right:20px;
}
.powered-by-team-oss{
  position: fixed;
  right: 20px;
  bottom: 10px;
}
  .prmodal {max-height: 70% !important }
}
@media print {
    .noPrint {
        display:none;
      }
    }
  </style>
</head>
