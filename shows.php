<?php
  include('./utils.php');

  $maxPage = 1;
  $page = $_GET['page'];
  if (!$page || $page <= 1)
    $page = 1;
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
    <div class="flex-page">
      <?php
        $response = json_decode(request(get_url("tv/popular", ["page=".$page])));
        global $maxPage;
        $maxPage = $response->total_pages;
        foreach ($response->results as $value) {
          echo get_show_card($value);
        }
        global $page;
      ?>
      </div>
      <div class="pagination">
        <?php
          global $maxPage;
          echo "
            <a class='square' href='/shows.php?page=".(0)."'><<</a>
            <a class='square' href='/shows.php?page=".($page - 1)."'><</a>
            <span class='square'>$page</span>
            <a class='square' href='/shows.php?page=".($page + 1)."'>></a>
            <a class='square' href='/shows.php?page=".($maxPage)."'>>></a>
          ";
        ?>
    </div>
    <?php include('./components/footer.php') ?>
  </body>
</html>
