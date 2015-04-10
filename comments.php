<?php // comment template

// do not delete the next seven lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('Please do not load this page directly. Thanks!');
}
if (post_password_required()) {
	echo '<p class="alert">This post is password protected. Enter the password to view comments.</p>';
	return;
} ?>


<?php if (have_comments()) : ?>

	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses'); ?></h3>
	<ol class="commentlist">

		<?php wp_list_comments(); ?>

	</ol>
	<div class="paged-comment-links">
		<?php previous_comments_link(); ?>  <?php next_comments_link(); ?>
	</div>

<?php else : // no comments yet ?>

	<?php if (comments_open()) : ?>

	<!-- no comments yet & comments open -->

	<?php else : // no comments yet & comments closed ?>

	<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>

<?php endif; ?>


<?php if (comments_open()) : ?>

	<div id="respond">

		<?php comment_form(); ?>

	</div>

<?php endif; ?>