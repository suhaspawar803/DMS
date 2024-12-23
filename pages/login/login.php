<?php
  session_start();
  $name=$_POST['username'];
  $pass=md5($_POST['password']);
  include'../../data.php';
  if($db)
  {
	  $sql = "SELECT role FROM users WHERE username='$name' AND password='$pass';";
    $ret=pg_query($db,$sql);
	if($ret)
	{
	  $role=pg_fetch_row($ret);
	  if($role[0])
    {
      $_SESSION['username'] = $name;
      header("Location: ../display/users.php");
      exit();
	}
	  else
		echo "<br>Invalid password";
	}
	else
	  echo "<br>Invalid Username or password";
  }
  else
	echo "Internal Error: Please contact Admin";
  pg_close($db);
?>