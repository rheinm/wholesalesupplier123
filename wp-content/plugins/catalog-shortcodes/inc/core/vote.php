<?php

class Ts_Vote {

	function __construct() {
		add_action( 'load-plugins.php', array( __CLASS__, 'init' ) );
		add_action( 'wp_ajax_ts_vote',  array( __CLASS__, 'vote' ) );
	}

	public static function init() {
		Catalog_Shortcodes::timestamp();
		$vote = get_option( 'ts_vote' );
		$timeout = time() > ( get_option( 'ts_installed' ) + 60*60*24*3 );
		if ( in_array( $vote, array( 'yes', 'no', 'tweet' ) ) || !$timeout ) return;
		add_action( 'in_admin_footer', array( __CLASS__, 'message' ) );
		add_action( 'admin_head',      array( __CLASS__, 'register' ) );
		add_action( 'admin_footer',    array( __CLASS__, 'enqueue' ) );
	}

	public static function register() {
		wp_register_style( 'ts-vote', plugins_url( 'assets/css/vote.css', TS_PLUGIN_FILE ), false, TS_PLUGIN_VERSION, 'all' );
		wp_register_script( 'ts-vote', plugins_url( 'assets/js/vote.js', TS_PLUGIN_FILE ), array( 'jquery' ), TS_PLUGIN_VERSION, true );
	}

	public static function enqueue() {
		wp_enqueue_style( 'ts-vote' );
		wp_enqueue_script( 'ts-vote' );
	}

	public static function vote() {
		$vote = sanitize_key( $_GET['vote'] );
		if ( !is_user_logged_in() || !in_array( $vote, array( 'yes', 'no', 'later', 'tweet' ) ) ) die( 'error' );
		update_option( 'ts_vote', $vote );
		if ( $vote === 'later' ) update_option( 'ts_installed', time() );
		die( 'OK: ' . $vote );
	}

	public static function message() {
?>
		<div class="ts-vote" style="display:none">
			<div class="ts-vote-wrap">
				<div class="ts-vote-gravatar"><a href="http://profiles.wordpress.org/gn_themes" target="_blank"><img src="http://www.gravatar.com/avatar/54fda46c150e45d18d105b9185017aea.png" alt="<?php _e( 'Themestall', 'catalog' ); ?>" width="50" height="50" /></a></div>
				<div class="ts-vote-message">
					<p><?php _e( 'Hello, my name is Themestall, and I am developer of plugin <b>Catalog Shortcodes</b>.<br>If you like this plugin, please write a few words about it at the wordpress.org or twitter. It will help other people find this useful plugin more quickly.<br><b>Thank you!</b>', 'catalog' ); ?></p>
					<p>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=ts_vote&amp;vote=yes" class="ts-vote-action button button-small button-primary" data-action="http://wordpress.org/support/view/plugin-reviews/catalog?rate=5#postform"><?php _e( 'Rate plugin', 'catalog' ); ?></a>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=ts_vote&amp;vote=tweet" class="ts-vote-action button button-small" data-action="http://twitter.com/share?url=http://bit.ly/1blZb7u&amp;text=<?php echo urlencode( __( 'Catalog Shortcodes - must have WordPress plugin #catalogshortcodes', 'catalog' ) ); ?>"><?php _e( 'Tweet', 'catalog' ); ?></a>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=ts_vote&amp;vote=no" class="ts-vote-action button button-small"><?php _e( 'No, thanks', 'catalog' ); ?></a>
						<span><?php _e( 'or', 'catalog' ); ?></span>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=ts_vote&amp;vote=later" class="ts-vote-action button button-small"><?php _e( 'Remind me later', 'catalog' ); ?></a>
					</p>
				</div>
				<div class="ts-vote-clear"></div>
			</div>
		</div>
		<?php
	}
}

new Ts_Vote;
