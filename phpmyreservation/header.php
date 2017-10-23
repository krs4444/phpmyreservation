<?php include_once('main.php'); ?>

<div id="header_inner_div"><div id="header_inner_left_div">
<a href="#">Rezervácie</a>

<?php

if(isset($_SESSION['logged_in']))
{
	echo ' | <a href="#help">Pomoc</a>';
}

?>

</div><div id="header_inner_center_div">

<?php

if(isset($_SESSION['logged_in']))
{
	echo '<b>Dnes je: ' . date('j n Y') . '</b>';
}

?>

</div><div id="header_inner_right_div">

<?php

if(isset($_SESSION['logged_in']))
{
	echo '<a href="#cp">Ovládací panel</a> | <a href="#logout">Odhlásiť sa</a>';
}
else
{
	echo 'Nie ste prihlásený';
}

?>

</div></div>
