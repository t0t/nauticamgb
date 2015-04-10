
	<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
		<div>
			<label for="s" class="label-search screen-reader-text">Search for: </label>
			<input type="text" class="field" name="s" id="s" placeholder="Search...">
			<input type="submit" class="submit" name="submit" id="searchsubmit" value="Go">
		</div>
	</form>