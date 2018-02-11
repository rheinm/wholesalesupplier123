<?php
function catalog_breadcrumbs() {
  $show_breadcrumbs =  (function_exists('ot_get_option'))? ot_get_option('show_breadcrumbs', 'on') : 'on';
  if( $show_breadcrumbs == 'off' )
    return false;
  if(is_front_page() && is_page())
    return false; 
  
  $home = '';
  $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $bredcrumb_menu_prefix = (function_exists('ot_get_option'))? ot_get_option('bredcrumb_menu_prefix', 'Home') : '';
  if( $bredcrumb_menu_prefix != '' ){
    $home = $bredcrumb_menu_prefix;
  } 
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show 
 
  global $post, $wp_query;
  $homeLink = home_url();
  
  if ( is_home() && ( 'page' == get_option('show_on_front')) ) {
  
    if ($showOnHome == 1 || is_front_page()) {
      echo '<div class="bread"><ol class="breadcrumb"><li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>';
    
       echo '<li>'. get_the_title(get_option('page_for_posts')) . '</li>';
    
      echo '</ul></div>';
    }
  
  } else {
  
    echo '<div class="bread"><ol class="breadcrumb"><li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>';
  
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ');
      echo '<li><span class="active">' . sprintf(esc_html__('Archive by category %s', 'catalog'), single_cat_title('', false)) . '</span></li>';
  
    } elseif ( is_search() ) {
      echo '<li><span class="active">' . sprintf(esc_html__('Search results for %s', 'catalog'),get_search_query()) . '</span></li>';
  
    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ';
      echo '<li><span class="active">' . get_the_time('d') . '</span></li>';
  
    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ';
      echo '<li><span class="active">' . get_the_time('F') . '</span></li>';
  
    } elseif ( is_year() ) {
      echo '<li><span class="active">' . get_the_time('Y') . '</span></li>';
  
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' .esc_url(get_post_type_archive_link( get_post_type()) ) . '">' . $post_type->labels->singular_name . '</a></li>';
        if ($showCurrent == 1) echo '<li><span class="active">' . get_the_title() . '</span></li>';
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo '<li>' .$cats. '</li>';
        if ($showCurrent == 1) echo '<li><span class="active">' . get_the_title() . '</span></li>';
      }
  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a></li>';
      if ($showCurrent == 1) echo ' ' . '<li><span class="active">' . get_the_title() . '</span></li>';
  
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo '<li><span class="active">' . get_the_title() . '</span></li>';
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo force_balance_tags($breadcrumbs[$i]);
      }
      if ($showCurrent == 1) echo ' ' . '<li><span class="active">' . get_the_title() . '</span></li>';
  
    } elseif ( is_tag() ) {
      echo '<li><span class="active">' . sprintf(esc_html__('Posts tagged %s', 'catalog'), single_tag_title('', false)) . '"' . '</span></li>';
  
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo '<li><span class="active">' . sprintf(esc_html__('Articles posted by %s', 'catalog'), $userdata->display_name) . '</span></li>';
  
    } elseif ( is_404() ) {
      echo '<li><span class="active">' . esc_html__('Error 404', 'catalog') . '</span></li>';
    }
  
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '<li>(';
      echo '<li><span class="active">'.esc_html__('Page', 'catalog') . ' ' . get_query_var('paged'). '</span></li>';
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')</li>';
    }    
  
    echo '</ul></div>';
  
  }
} // end catalog_breadcrumbs()