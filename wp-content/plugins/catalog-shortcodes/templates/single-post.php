<div class="ts-posts ts-posts-single-post">
	<?php
		// Prepare marker to show only one post
		$first = true;
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;

				// Show oly first post
				if ( $first ) {
					$first = false;
					?>
					<div id="ts-post-<?php the_ID(); ?>" class="ts-post">
						<h1 class="ts-post-title"><?php the_title(); ?></h1>
						<div class="ts-post-meta"><?php _e( 'Posted', 'catalog' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?> | <a href="<?php comments_link(); ?>" class="ts-post-comments-link"><?php comments_number( __( '0 comments', 'catalog' ), __( '1 comment', 'catalog' ), __( '%n comments', 'catalog' ) ); ?></a></div>
						<div class="ts-post-content">
							<?php the_content(); ?>
						</div>
					</div>
					<?php
				}
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'catalog' ) . '</h4>';
		}
	?>
</div>