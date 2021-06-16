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

  function get_poster_src($e) {
    if (!$e)
      return './assets/default_poster.png';
    return "https://image.tmdb.org/t/p/w300/$e";
  }

  function get_movie_card($content) {
    echo "
      <a class='card' href='/movie.php?id=$content->id'>
        <img style='width: 300px; height: 450px;' src='".get_poster_src($content->poster_path)."'/>
        <div class='overlay'>
          <div class='overlay-text'>More infomations</div>
        </div>
      </a>
    ";
  }

  function get_show_card($content) {
    echo "
      <a class='card' href='/show.php?id=$content->id'>
        <img style='width: 300px; height: 450px;' src='".get_poster_src($content->poster_path)."'/>
        <div class='overlay'>
          <div class='overlay-text'>More informations</div>
        </div>
      </a>
    ";
  }
?>
