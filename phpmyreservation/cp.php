﻿<?php 

include_once('main.php');

if(check_login() != true) { exit; }

if($_SESSION['user_is_admin'] == '1' && isset($_GET['list_users']))
{
	echo list_users();
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['reset_user_password']))
{
	$user_id = mysql_real_escape_string($_POST['user_id']);
	echo reset_user_password($user_id);
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['change_user_permissions']))
{
	$user_id = mysql_real_escape_string($_POST['user_id']);
	echo change_user_permissions($user_id);
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['delete_user_data']))
{
	$user_id = mysql_real_escape_string($_POST['user_id']);
	$data = $_POST['delete_data'];
	echo delete_user_data($user_id, $data);
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['delete_all']))
{
	$data = $_POST['delete_data'];
	echo delete_all($data);
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['save_system_configuration']))
{
	$price = mysql_real_escape_string($_POST['price']);
	echo save_system_configuration($price);
}
elseif(isset($_GET['get_usage']))
{
	echo get_usage();
}
elseif(isset($_GET['get_reservation_reminders']))
{
	echo get_reservation_reminders();
}
elseif(isset($_GET['toggle_reservation_reminder']))
{
	echo toggle_reservation_reminder();
}
elseif(isset($_GET['change_user_details']))
{
	$user_name = mysql_real_escape_string(trim($_POST['user_name']));
	$user_email = mysql_real_escape_string($_POST['user_email']);
	$user_password = mysql_real_escape_string($_POST['user_password']);
	echo change_user_details($user_name, $user_email, $user_password);
}
else
{
	echo '<div class="box_div" id="cp_div"><div class="box_top_div"><a href="#">Štart</a> &gt; Ovládací panel</div><div class="box_body_div">';

	if($_SESSION['user_is_admin'] == '1')
	{

?>

		<h3>Administrácia užívateľov</h3>

		<div id="users_div"><?php echo list_users(); ?></div>

		<p class="center_p"><input type="button" class="small_button blue_button" id="reset_user_password_button" value="Znovu nastaviť heslo"> <input type="button" class="small_button blue_button" id="change_user_permissions_button" value="Zmeniť práva"> <input type="button" class="small_button" id="delete_user_reservations_button" value="Vymazať rezervácie"> <input type="button" class="small_button" id="delete_user_button" value="Vymazať užívateľa"></p>
		<p class="center_p" id="user_administration_message_p"></p>

		<hr>

		<h3>Administrácia databázy</h3>

		<p class="smalltext_p">Pre zmenu týchto nastavení, bude potrebné potvrdenie. Vaše údaje a rezervácie nebudú vymazané, pokým nezvolíte možnosť Vymazať všetko.</p>

		<p><input type="button" class="small_button" id="delete_all_reservations_button" value="Vymazať všetky rezervácie"> <input type="button" class="small_button" id="delete_all_users_button" value="Vymazať všetkých užívateľov"> <input type="button" class="small_button" id="delete_everything_button" value="Vymazať všetko"></p>

		<p id="database_administration_message_p"></p>

		<hr>

		<h3>Systémové nastavenia</h3>

		<p class="smalltext_p">Zmena ceny nezmení cenu predchádzajúcich rezervácií.</p>

		<form action="." id="system_configuration_form"><p>

		<input type="text" id="price_input" value="<?php echo get_configuration('price'); ?>"> <label for="price_input">Cena rezervácie v <?php echo global_currency; ?></label><br><br>

		<input type="submit" class="blue_button small_button" value="Uložiť nastavenia">

		</p></form>

		<p id="system_configuration_message_p"></p>

		<hr class="blue_hr thick_hr">

<?php

	}

?>

	<h3>Vaša spotreba</h3>

	<p class="smalltext_p">Ak ste použili saunu bez predchádzajúcej rezervácie, stlačte tlačidlo nižšie. Táto akcia sa nedá zvrátiť.</p>

	<div id="usage_div"><?php echo get_usage(); ?></div>

	<p><input type="button" class="blue_button small_button" id="add_one_reservation_button" value="Pridaj 1 ku mojim rezerváciám"></p>

	<p id="usage_message_p"></p>

	<hr>

<?php

	if(global_reservation_reminders == '1')
	{

?>

	<h3>Vaše nastavenia</h3>

	<p class="smalltext_p">Predtým, ako zmeníte niektoré nastavenia, skontrolujte či sú údaje o Vás správne.</p>
	<p><span id="reservation_reminders_span"><?php echo get_reservation_reminders(); ?></span> <label for="reservation_reminders_checkbox">Send me reservation reminders by email</label></p>

	<p id="settings_message_p"></p>

	<hr>

<?php

	}

?>

	<h3>Údaje o Vás</h3>

	<p class="smalltext_p">Ak si zmeníte prihlasovací email, pri nasledujúcom prihlásení musíte použiť už tento nový email. Heslo môžete ponechať prázdne pre zachovanie starého hesla.</p>

	<form action="." id="user_details_form" autocomplete="off"><p>

	<div id="user_details_div"><div>
	<label for="user_name_input">Číslo bytu:</label><br>
	<input type="text" id="user_name_input" value="<?php echo $_SESSION['user_name']; ?>"><br><br>
	<label for="user_email_input">Email:</label><br>
	<input type="text" id="user_email_input" autocapitalize="off" value="<?php echo $_SESSION['user_email']; ?>">
	</div><div>
	<label for="user_password_input">Heslo:</label><br>
	<input type="password" id="user_password_input"><br><br>
	<label for="user_password_confirm_input">Heslo znova:</label><br>
	<input type="password" id="user_password_confirm_input">
	</div></div>

	<p><input type="submit" class="small_button blue_button" value="Uložiť údaje o mne"></p>

	</p></form>

	<p id="user_details_message_p"></p>

	</div></div>

<?php

}

?>
