<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html;charset=utf-8">

<title>Chyba</title>

</head>

<body>

<p>

<?php

if(isset($_GET['error_code']))
{
	$error_code = $_GET['error_code'];
}
else
{
	$error_code = '0';
}

if($error_code == '1')
{
	echo 'Salt must be 9 characters. Check config.php.';
}
elseif($error_code == '2')
{
	echo 'Musíte povoliť JavaScript vo svojom prehliadači';
}
elseif($error_code == '3')
{
	echo 'Musíte povoliť cookies vo svojom prehliadači';
}
else
{
	echo 'Neznáma chyba';
}

?>

</p>

<p><a href=".">Kliknite sem pre návrat naspäť</a></p>

</body>

</html>
