
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  require_once dirname(__FILE__).'/config.php';
  // header("Location: "._APP_URL."/app/calculator/calc_view.php");
  include _ROOT_PATH.'/app/calculator/calc.php';
  ?>
</body>
</html>