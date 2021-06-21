<?php
  include('./utils.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	  <title>TFLIX</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link rel="icon" href="/assets/favicon.ico" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>
	<body id="top">
    <?php include('./components/header.php') ?>
    <a class="refresh-btn" href='/random.php'>
      <svg width="40px" height="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489.533 489.533" style="enable-background:new 0 0 489.533 489.533;" xml:space="preserve">
      	<path fill="white" d="M268.175,488.161c98.2-11,176.9-89.5,188.1-187.7c14.7-128.4-85.1-237.7-210.2-239.1v-57.6c0-3.2-4-4.9-6.7-2.9 l-118.6,87.1c-2,1.5-2,4.4,0,5.9l118.6,87.1c2.7,2,6.7,0.2,6.7-2.9v-57.5c87.9,1.4,158.3,76.2,152.3,165.6 c-5.1,76.9-67.8,139.3-144.7,144.2c-81.5,5.2-150.8-53-163.2-130c-2.3-14.3-14.8-24.7-29.2-24.7c-17.9,0-31.9,15.9-29.1,33.6 C49.575,418.961,150.875,501.261,268.175,488.161z"/>
      </svg>
    </a>
    <a class="fab-bot-mid" style="transform: rotate(-90deg);" href="#bottom">
      <svg width="40px" height="40px" rotate="90" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 12L20 12M4 12L10 6M4 12L10 18" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
    <div class="flex-page" id="bot">
      <?php
        $trailer=null;
        $movies=json_decode(request(get_url('discover/movie', ["page=".rand(10, 150)])))->results;
        $movie=json_decode(request(get_url('movie/'.$movies[0]->id, ["append_to_response=videos"])));
        if ($movie->videos->results && count($movie->videos->results)) {
          $trailers = array_filter($movie->videos->results, function($e) {
            return $e->type == "Trailer";
          });
          if (count($trailers)) {
            usort($trailers, function($d, $e) {
              return $d->size > $e->size;
            });
            $trailer=$trailers[0];
          }
        }
        echo "
          <div>
		    	  <div class='movie-details'>
		    	  	<div class='movie-details-poster'>
		    	  		<img src='".get_poster_src($movie->poster_path)."' style='width: 500px'/>
		    	  	</div>
		    	  	<div class='movie-details-details'>
		    	  		<div>
		    	  			<span style='font-size: 40px;'>$movie->original_title</span
		    	  			<span style='font-size: 10px;'> ($movie->original_language)</span>
		    	  		</div>";
		    	  		if ($movie->tagline)
		    	  			echo "<span style='font-size: 30px; border-bottom: 1px solid white; margin-bottom: 15px; padding-bottom: 15px;'>$movie->tagline</span>";
		    	  		if ($movie->overview)
		    	  			echo "<div style='width: 50%; font-size: 20px;'>$movie->overview</div>";
		    	  		echo "<span style='font-size: 15px; margin-top: 5px;'>Released on $movie->release_date</span>
		    	  		<span style='font-size: 15px; font-style: italic;'>$movie->vote_average/10 ($movie->vote_count votes)</span>
		    	  	</div>
              <iframe class='trailer' src='https://www.youtube-nocookie.com/embed/$trailer->key' title='$trailer->name' allowFullScreen height='300px' width='550px'></iframe>
		    	  </div>
            <div style='height: 96vh'>
              <h3 style='text-align: center; margin: 50px 20px 10px 20px; padding-top: 25px;'>You may also like</h3>
              <div style='display: flex; justify-content: space-evenly; margin-top: 10%' id='bottom'>";
                echo get_movie_card($movies[1]);
                echo get_movie_card($movies[2]);
                echo get_movie_card($movies[3]);
                echo get_movie_card($movies[4]);
                echo get_movie_card($movies[5]);
                echo "
              </div>
            </div>
          </div>
        ";
      ?>
    </div>
	</body>
    <?php include('./components/footer.php') ?>
</html>