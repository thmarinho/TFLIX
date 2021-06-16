<?php
	echo "
		<header>
			<img style='height: 60%; margin-left: 2%;' src='../assets/logo.png' />
			<div style='width: 100%; display: flex; justify-content: space-around; align-items: center'>
				<a href='/'>Trending movies</a>
				<a href='/shows.php'>TV Shows</a>
				<a href='/'>Something else</a>
			</div>
			<form action='search.php' method='POST' style='margin-right: 30px;'>
				<input class='search-bar' type='text' name='search' placeholder='Type something...'/>
			</form>
		</header>
	"
?>