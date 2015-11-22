<?php
require 'db_connect.php';

if(isset($_POST['submit'])&&isset($_POST['password']) && isset($_POST['userName']))
{
	if(!empty($_POST['password'])&& !empty($_POST['userName'])){
		$userName=$_POST['userName'];
		$pass=md5($_POST['password']);
		$query="SELECT user from info where user='".$userName."' AND password='".$pass."'";
		/*if the user's input corresponds to $username=' OR "=' and $pass='	OR"=' this
		will lead to a true return thus a successful login in
		to avoid this use mysql_real_escape_string() which takes care of the single and double quotes*/
		$feebback=mysql_query($query);
		if(mysql_num_rows($feebback)>=1)//since the user is unique equate the mysql_num_row($feedback)==1
			header("Location: home.php");
		else
			echo "User name ".$userName." doesnt exists";
	}
	else 
		echo "Please fill in the required fields";

}
/*also you can edit php.ini file and set the magic quotes on,
and finally among others ways you can limit the privillages of the user via the phpMyAdmin interface*/

?>


<html>
<body>

<form>
User Name<input type="text" name="userName">
Password <input type="password" name="password">
<input type="submit" value="Login" name="submit">
</form>




</body>
</html>
