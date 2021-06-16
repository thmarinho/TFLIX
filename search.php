<?php
  include('./utils.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	  <title>TFLIX</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link rel="icon" href="/assets/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <?php include('./components/header.php') ?>
    <div class="flex-page">
      <?php
        $search = $_POST["search"];
        if (!$search) header('Location: /');
        $elements = json_decode(request(get_url('search/multi', ["query=".$search])))->results;

        $elements = array_filter($elements, function($e) {
          if ($e->media_type == "movie" || $e->media_type == "tv")
            return true;
          return false;
        });

        if (!count($elements)) {
          echo "
            <div style='width: 100%; align-self: center; text-align: center;'>
              <h1 style='font-weight: normal;'>No result.</h1>
              <h1 style='font-weight: normal;'>Return to the <a style='text-decoration-line: underline;' href='/'>home page</a>.</h1>
            </div>
          ";
        } else {
          foreach ($elements as $e) {
            if ($e->media_type == "movie")
              echo get_movie_card($e);
            else {
              echo get_show_card($e);
            }
          }
        }
      ?>
    </div>
    <?php include('./components/footer.php') ?>
  </body>
</html>