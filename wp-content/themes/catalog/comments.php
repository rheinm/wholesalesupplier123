<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to catalog_comments() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Catalog
 * @since Catalog 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<?php if ( have_comments() ) : ?>
<div class="comments page-with-bg">
	<div class="widget-title">
		<h4>
        <?php
			$comments_number = get_comments_number();
			if ( 1 === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( '(1) Comment - %s', 'comments title', 'catalog' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'(%1$s) Comments - %2$s',
						'(%1$s) Comments - %2$s',
						$comments_number,
						'comments title',
						'catalog'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
		?>
		</h4>
    </div><!-- end widget-title -->
    <div id="comments" class="comments">    	
        <ol class="comment-lists"><?php wp_list_comments( array( 'callback' => 'catalog_comments', 'style' => 'ol', 'short_ping'  => true ) ); ?></ol><!-- .commentlist -->   
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-below" class="navigation" role="navigation">
            <h1 class="assistive-text section-heading"><?php esc_html_e( 'Comment navigation', 'catalog' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'catalog' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'catalog' ) ); ?></div>
        </nav>
        <?php endif; // check for comment navigation ?>
        
		<?php
        /* If there are no comments and comments are closed, let's leave a note.
         * But we only want the note on posts and pages that had comments in the first place.
         */
        if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="nocomments"><?php esc_html_e( 'Comments are closed.' , 'catalog' ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php endif; // have_comments() ?>

<?php if ( comments_open() ) : ?>
	<?php catalog_comment_form(); ?>
<?php endif; ?>