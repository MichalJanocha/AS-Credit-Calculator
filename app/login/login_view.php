<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logowanie</title>
</head>
<body>
  <form action="<?php print(_APP_ROOT); ?>/app/login/login.php" method="post">
    <input id="login" name="login" type="text"/>
    <input id="pass" name="pass" type="password"/>

    <input type="submit" value="Zaloguj">
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

</form>	
  <!-- </div> -->
</body>
</html>