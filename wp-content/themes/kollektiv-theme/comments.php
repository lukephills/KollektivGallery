
<?php if ( have_comments() ) : ?>
	<h5 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' ); ?></h5>
	<ol class="comment-list">
		<?php wp_list_comments( 'callback=custom_comments' ); ?>
	</ol>
<?php endif; ?>

<?php 
	$comments_args = array(
    'label_submit'=>'Submit Comment',
    'title_reply'=>'Post a Comment',
    'comment_notes_after' => '',
    );
	comment_form($comments_args); 
?>