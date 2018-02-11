<?php
/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class Catalog_Widget_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => esc_html__( "The most recent posts on your site", 'catalog') );
        parent::__construct('recent-posts', esc_html__('Catalog Recent Posts', 'catalog'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo esc_html($cache[ $args['widget_id'] ]);
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'catalog' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo wp_kses($before_widget,array(
			'div' => array(
			  'id' => array(),
			  'class' => array()
			),
		  )); ?>
        <?php if ( $title ) echo wp_kses($before_title,array('div' => array('class' => array()), 'h4' => array())) . esc_html($title) . wp_kses($after_title,array('div' => array(),'h4' => array())); ?>
        <ul class="shop-list">
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <li>
            	<?php if( has_post_thumbnail() ): ?>
                <div class="alignleft">
                    <?php catalog_post_thumb( 160 ); ?>
                </div><!-- end entry -->
                <?php endif; ?>
                

                <h3><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h3>
            <?php if ( $show_date ) : ?>
            	<small><?php echo get_the_date(); ?></small>
                
            <?php endif; ?>
            <a class="new-price" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html__('Read More', 'catalog'); ?></a>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php echo wp_kses($after_widget,array(
			'div' => array(),
		  )); ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'catalog' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'catalog' ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'catalog' ); ?></label></p>
<?php
    }
	

}

function catalog_register_custom_widgets() {
    register_widget( 'Catalog_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'catalog_register_custom_widgets' );
?>