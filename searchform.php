<form class="search-form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Поиск" />
  <button type="submit" id="searchsubmit" aria-label="Найти"></button>
</form>
