<?php
require( __DIR__ . "/db/db.php");
require (__DIR__ ."/header.php");
if(isset($_POST['submitme'])){
$username=filter_input(INPUT_POST,'username');
$password=filter_input(INPUT_POST,'password');
if(empty($username) ||empty($password))
{
echo '<script>alert("Username or Password can\'t be  empty");</script>';
}else {
$getreport=$DB->query("SELECT * FROM user_panel WHERE user_name=? and user_pass=?", array($username,$password));
if(sizeof($getreport)==0){
echo '<script>alert("Sorry we don\'t find your record");</script>';
}else{
setcookie("adminlogin", $username, time() + (86400 * 30), "/");
header("Location: dashboard.php");
}
}
}
?>

<body>
  <div class="container">
    <div class="admin_area">
      <form class="form-signin" name="admin_log" method="POST" action="">
        <h2 class="form-signin-heading">Admin Login page</h2>
        <hr class="formhr">
        <label for="inputusername" class="sr-only">Username</label>
        <input type="text" id="inputusername" class="form-control" placeholder="User Name" name="username" autocomplete="off" required >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
        <input type="submit" class="btn btn-lg btn-primary btn-block" name="submitme" value="Sign in">
      </form>
    </div>
    </div> <!-- /container -->
    <script src="resources/js/jquery-3.2.1.min.js"></script>
    <script src="resources/js/jquery.cookie.js"></script>
    <script src="resources/js/jqBootstrapValidation.js"></script>
  </body>
</html>