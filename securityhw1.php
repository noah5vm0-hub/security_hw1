<?php
if (isset($_POST["login"]))
{
        $link = mysqli_connect('localhost', 'secpro', 'Snsysu001');
	mysqli_set_charset('utf8', $link);
	$db_selected = mysqli_select_db($link, 'Secure_Programming_Test');
	
	$query = "SELECT * FROM member WHERE username='" . $_POST["username"] . 

		"' AND password='" . $_POST["password"] . "'";

	$result = mysqli_query($link, $query) 
		or die("MySQL Query Error : " . mysqli_error() . "   SQL: " . $q
uery);
	
	$match_count = mysqli_num_rows($result);

	if ($match_count) 
	{
		mysqli_free_result($result);
		
		mysqli_close($link);
		header("Location: http://120.113.173.21/sqj1_s.php?user=" . $_PO
ST["username"]);
	}
	else
	{
		header("Location: http://" . $_SERVER["HTTP_HOST"] . $_SERVER["S
CRIPT_NAME"]); 
	}
}
?>

