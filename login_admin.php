<?php
include_once 'header.php';
if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=md5($_POST['password']);

  $query="SELECT * FROM admin where username='$username' AND password ='$password'";
  $execute=mysqli_query($con, $query);

  if(mysqli_num_rows($execute)>0)
  {
    session_start();
    $_SESSION['username']='admin';
    echo $_SESSION['username'];
    header('Location:admin_home.php');
  }
}


?>
<body>

    <nav class="teal lighten-3">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Student Feedback Portal</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
        </ul>
      </div>
    </nav>
<div class="row">
  <div class="col s12 m12"><br><br><br><br><br><br></div>
<div class="col s6 m6 l6 offset-s3 offset-l3 offset-m3">
  <div class="card grey lighten-4">
    <div class="card-content">
    <div class="row">
    <form class="col s10 offset-s2" method="post" action="login_admin.php">
      <div class="row">
        <div class="input-field col s12 pull-s1">
          <input id="username" type="text" class="validate" name="username">
          <label for="username">Username</label>
        </div>
        <div class="input-field col s12 pull-s1">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
        <div class="input-field col s6 push-s2">
          <button type="submit" name="login" class="waves-effect waves-light btn" id="submit">Submit</button>
        </div>
      </div>

  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
</body>
