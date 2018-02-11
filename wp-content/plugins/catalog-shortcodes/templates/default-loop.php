<div class="ts-posts ts-posts-default-loop">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>

				<div id="ts-post-<?php the_ID(); ?>" class="ts-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="ts-post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<?php endif; ?>
					<h2 class="ts-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="ts-post-meta"><?php _e( 'Posted', 'catalog' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?></div>
					<div class="ts-post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php comments_link(); ?>" class="ts-post-comments-link"><?php comments_number( __( '0 comments', 'catalog' ), __( '1 comment', 'catalog' ), '% comments' ); ?></a>
				</div>

				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'catalog' ) . '</h4>';
		}
	?>
</div>