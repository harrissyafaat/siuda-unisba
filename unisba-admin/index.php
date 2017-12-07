<?
session_start();

 if(isset($_SESSION['username']) && isset($_SESSION['username'])){
	 header('location:media_admin.php?module=home');
} ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Login Wisuda Online</title>
<link href="style/style_login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="box">
<div class="elements">
<div class="avatar"></div>
<div style="margin-bottom: 20px; text-align: center;font-size: 16px; color:#595959">Login Admin</div>

<form method="post" action="cek_login.php">
<input type="text" name="username" class="username" value="Username" onfocus="this.value=''" required />
<input type="password" name="password" class="password" value="Password" onfocus="this.value=''" required />
<input type="submit" name="submit" class="submit" value="Sign In" />
</form>
</div>
</div>
</body>
</html>