<?php
	session_start();
	if(isset($_SESSION['user'])){
	echo '<script> window.location="../mapa.php"; </script>';
	}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

	<link href="insesion.css" rel="stylesheet" type="text/css" media="screen and (min-device-width: 481px)" />
	<link href="insesionmovil.css" rel="stylesheet" type="text/css" media="handheld, only screen and (max-device-width: 480px)" />

<script src="insesion.js"></script>


</head>

<body>
<form method="post" action="validar.php">
<div class='login'>
  <h2>Sign in</h2>
  <input name='user' placeholder='Username' type='text'/>
  <input id='pw' name='pw' placeholder='Password' type='password'/>
  <div class='remember'>
    <input checked='' id='remember' name='remember' type='checkbox'/>
    <label for='remember'></label>Remember me
  </div>
  <input type='submit' value='Sign in' name="login"/>
  <a class='forgot' href='#'>Forgot your password?</a>
</div>
</form>
</body>

<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
