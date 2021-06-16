<?php
  include('./utils.php');
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
		<a class='fab-top-left' href='/shows.php'>
      <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 12L20 12M4 12L10 6M4 12L10 18" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
		</a>
    <?php
      $id = $_GET["id"];
      $show = json_decode(request(get_url("tv/$id")));
      echo "
			<div class='movie-details'>
				<div class='movie-details-poster'>
					<img src='".get_poster_src($show->poster_path)."' style='width: 500px;'/>
				</div>
				<div class='movie-details-details'>
					<div>
						<span style='font-size: 40px;'>$show->name</span
						<span style='font-size: 10px;'> ($show->original_language)</span>
					</div>
					<span style='font-size: 30px; border-bottom: 1px solid white; margin-bottom: 15px; padding-bottom: 15px;'>$show->tagline</span>
					<div style='width: 50%; font-size: 20px;'>$show->overview</div>
					<span style='font-size: 15px; margin-top: 5px;'>First episode on $show->first_air_date</span>
					<span style='font-size: 15px; font-style: italic; border-bottom: 1px solid white; margin-bottom: 15px; padding-bottom: 15px;'>$show->vote_average/10 ($show->vote_count votes)</span>
					<span>$show->number_of_seasons seasons - $show->number_of_episodes episodes</span>
				</div>
			</div>
      ";
    ?>
	</body>
    <?php include('./components/footer.php') ?>
</html>