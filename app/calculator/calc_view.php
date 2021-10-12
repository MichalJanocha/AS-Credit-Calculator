<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>
<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php">Wyloguj</a>
<form action="<?php print(_APP_URL);?>/app/calculator/calc.php" method="post">
	<label for="amount">Kwota (PLN): </label>
	<input id="amount" type="number" name="amount" value="<?php isset($amount) ? print($amount) : printf('') ?>" /><br />

	<label for="years">Na ile lat: </label>
	<input id="years" type="number" name="years" value="<?php isset($years) ? print($years) : printf('') ?>" /><br />

  <label for="percent">Oprocentowanie (%): </label>
	<input id="percent" type="number" name="percent" value="<?php isset($percent) ? print($percent) : printf('') ?>" /><br />

	<input type="submit" value="Oblicz" />
</form>	

<?php
if (isset($errors)) {
	if (count ( $errors ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $errors as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:350px;">
<?php echo 'Miesieczna rata to: <strong>'.$result.'</strong>'; ?>
</div>
<?php } ?>

</body>
</html>
