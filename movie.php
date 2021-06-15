<?php
  include('./utils.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	  <title>Learning PHP</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link rel="icon" href="/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>
	<body>
    <?php
      $id = $_GET["id"];
      $movie = json_decode(request(get_url("movie/$id")));
      echo "
			<div class='movie-details'>
				<div class='movie-details-poster'>
					<img src='https://image.tmdb.org/t/p/w500/$movie->poster_path'/>
				</div>
				<div class='movie-details-details'>
					<div>
						<span style='font-size: 40px;'>$movie->original_title</span
						<span style='font-size: 10px;'> ($movie->original_language)</span>
					</div>
					<span style='font-size: 30px'>$movie->tagline</span>
					<div style='width: 50%; font-size: 20px;'>$movie->overview</div>
					<span style='font-size: 15px; margin-top: 5px;'>Released on $movie->release_date</span>
					<span style='font-size: 15px; font-style: italic;'>$movie->vote_average/10 ($movie->vote_count votes)</span>
				</div>
			</div>
      ";
    ?>
	</body>
    <?php include('./components/footer.php') ?>
</html>