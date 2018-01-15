<form role="search" method="get" class="form-inline searchform group" action="<?php echo home_url( '/' ); ?>">
    <input class="form-control" type="text" placeholder="Search" value="<?php echo get_search_query(); ?>" id="searchfield" name="s" required>
        <button class="btn btn-primary" type="submit">Search</button>
</form>
