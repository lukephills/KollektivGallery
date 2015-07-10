<?
/**
 * Get special excerpt if it exists
 */
if (get_field('excerpt')) {
    the_field('excerpt');
} else {
    the_content();
}
hello
?>