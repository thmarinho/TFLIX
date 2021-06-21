<?php
  include('./utils.php');

  class Media {
    private string $title;
    private string $language;
    private string $tagline;
    private string $overview;
    private string $poster;
    private string $releaseDate;
    private float $voteAverage;
    private int $voteCount;
    private int $numberOfSeasons;
    private int $numberOfEpsiodes;

    function __construct($content, $isTvShow) {
      $this->title = $isTvShow ? $content->name : $content->original_title;
      $this->language = $content->original_language;
      $this->tagline = $content->tagline;
      $this->overview = $content->overview;
      $this->poster = get_poster_src($content->poster_path);
      $this->releaseDate = $isTvShow ? $content->first_air_date :$content->release_date;
      $this->voteAverage = $content->vote_average;
      $this->voteCount = $content->vote_count;
      $this->numberOfSeasons = $content->number_of_seasons;
      $this->numberOfEpsiodes = $content->number_of_episodes;
    }
    function getCard() {
      $card = <<< EOT
        <div class='movie-details'>
          <div class='movie-details-poster'>
            <img style='width: 500px' src='$this->poster'/>
          </div>
          <div class='movie-details-details'>
            <div>
              <span style='font-size: 40px;'>$this->title</span>
              <span style='font-size: 10px'>($this->language)</span>
            </div>
            <span style='font-size: 30px; border-bottom: 1px solid white; margin-bottom: 15px; padding-bottom: 15px'>$this->tagline</span>
            <div style='width: 50%; font-size: 20px;'>$this->overview</div>
            <span style='font-size: 15px; margin-top: 5px;'>First episode on $this->releaseDate</span>
            <span style='font-size: 15px; font-style: italic; border-bottom: 1px solid white; margin-bottom: 15px; padding-bottom: 15px;'>$this->voteAverage/10 ($this->voteCount votes)</span>
            <span>$this->numberOfSeasons seasons - $this->numberOfEpisodes episodes</span>
          </div>
        </div>
      EOT;
      return $card;
    }
  }
?>