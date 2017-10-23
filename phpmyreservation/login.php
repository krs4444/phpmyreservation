<?php

include_once('main.php');

if(isset($_GET['login']))
{
	$user_email = mysql_real_escape_string($_POST['user_email']);
	$user_password = mysql_real_escape_string($_POST['user_password']);
	$user_remember = $_POST['user_remember'];
	echo login($user_email, $user_password, $user_remember);
}
elseif(isset($_GET['logout']))
{
	logout();
}
elseif(isset($_GET['create_user']))
{
	$user_name = mysql_real_escape_string(trim($_POST['user_name']));
	$user_email = mysql_real_escape_string($_POST['user_email']);
	$user_password = mysql_real_escape_string($_POST['user_password']);
	$user_secret_code = $_POST['user_secret_code'];
	echo create_user($user_name, $user_email, $user_password, $user_secret_code);
}
elseif(isset($_GET['new_user']))
{

?>

	<div class="box_div" id="login_div"><div class="box_top_div"><a href="#">Štart</a> &gt; Registrácia bytu</div><div class="box_body_div">
	<div id="new_user_div"><div>

	<form action="." id="new_user_form"><p>

	<label for="user_name_input">Číslo bytu (napr. B455):</label><br>
	<input type="text" id="user_name_input"><br><br>
	<label for="user_email_input">Email:</label><br>
	<input type="text" id="user_email_input" autocapitalize="off"><br><br>
	<label for="user_password_input">Heslo:</label><br>
	<input type="password" id="user_password_input"><br><br>
	<label for="user_password_confirm_input">Heslo znova:</label><br>
	<input type="password" id="user_password_confirm_input"><br><br>

<?php

	if(global_secret_code != '0')
	{
		echo '<label for="user_secret_code_input">Registračný kód: <sup><a href="." id="user_secret_code_a" tabindex="-1">Čo je toto?</a></sup></label><br><input type="password" id="user_secret_code_input"><br><br>';
	}

?>

	<input type="submit" value="Zaregistruj byt">

	</p></form>

	</div><div>
	
	<p class="blue_p bold_p">Informácie:</p>
	<ul>
	<li>Rezerváciu je možné spraviť jedným kliknutím myši</li>
	<li>Prístup k minulým rezerváciám</li>
	<li>Heslo je zašifrované a nie je možné ho vidieť</li>
	</ul>

	<div id="user_secret_code_div">Registračný kód je kód definovaný adminom, aby sa zabránilo náhodnému registrovaniu ľudí mimo TAMMI 1. Tento kód je možné získať cez zástupcov vlastníkov na <span id="email_span"></span></div>

	<script type="text/javascript">$('#email_span').html('<a href="mailto:'+$.base64.decode('<?php echo base64_encode(global_webmaster_email); ?>')+'">'+$.base64.decode('<?php echo base64_encode(global_webmaster_email); ?>')+'</a>');</script>

	</div></div>

	<p id="new_user_message_p"></p>

	</div></div>

<?php

}
elseif(isset($_GET['forgot_password']))
{

?>

	<div class="box_div" id="login_div"><div class="box_top_div"><a href="#">Štart</a> &gt; Zabudnuté heslo</div><div class="box_body_div">

	<p>V prípade ak si nepamätáte svoje heslo, kontaktuj zástupcov vlastníkov emailom. Nové heslo Vám bude zaslané emailom. Po prihlásení si heslo budete môcť zmeniť (odporúčame).</p>

	<?php echo list_admin_users(); ?>

	</div></div>

<?php

}
else
{

?>

	<div class="box_div" id="login_div"><div class="box_top_div">Prihlásenie</div><div class="box_body_div">

	<form action="." id="login_form" autocomplete="off"><p>

	<label for="user_email_input">Email:</label><br><input type="text" id="user_email_input" value="<?php echo get_login_data('user_email'); ?>" autocapitalize="off"><br><br>
	<label for="user_password_input">Heslo:</label><br><input type="password" id="user_password_input" value="<?php echo get_login_data('user_password'); ?>"><br><br>
	<input type="checkbox" id="remember_me_checkbox" checked="checked"> <label for="remember_me_checkbox">Zapamätaj si ma</label><br><br>		
	<input type="submit" value="Prihlásiť">

	</p></form>

	<p id="login_message_p"></p>
	<p><a href="#new_user">Registrácia bytu</a> | <a href="#forgot_password">Zabudnuté heslo</a></p>

	</div></div>

<?php

}

?>
