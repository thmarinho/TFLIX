<?php
	function get_url($endpoint, $query = []) {

  	return "https://api.themoviedb.org/3/".$endpoint."?api_key=92cc822a29b2ee2cf00986e80cbeb0c9".(count($query) > 0 ? "&".join("&", $query) : "");
	}

  function request($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }

  function get_movie_card($content) {
    $card = <<< "EOT"
      <a class='card' href="/movie.php?id=$content->id">
        <img src='https://image.tmdb.org/t/p/w300/$content->poster_path'/>
        <div class="overlay">
          <div class="overlay-text">En savoir plus</div>
        </div>
      </a>
    EOT;
    return $card;
  }
