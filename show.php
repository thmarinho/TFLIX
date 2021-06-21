<?php
  // include('./utils.php');
	include('./media.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	  <title>TFLIX</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link rel="icon" href="/assets/favicon.ico" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>
	<body>
    <?php include('./components/header.php') ?>
		<a class='fab-top-left' href='/shows.php'>
      <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 12L20 12M4 12L10 6M4 12L10 18" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
		</a>
    <?php
      $id = $_GET["id"];
      $show = new Media(json_decode(request(get_url("tv/$id"))), true);
      echo $show->getCard();
    ?>
	</body>
    <?php include('./components/footer.php') ?>
</html>