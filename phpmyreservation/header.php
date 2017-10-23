<?php include_once('main.php'); ?>

<div id="header_inner_div"><div id="header_inner_left_div">

<a href="#about">O aplikácií</a>

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
	echo '<b>Týždeň ' . global_week_number . ' - ' . global_day_name . ' ' . date('jS F Y') . '</b>';
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
