<?php
/*
 Plugin Name: Comment Review Stars
 Plugin URI: http://www.linkedin.com/in/johngadbois
 Description: A simple plugin that helps turn comments into reviews
 Version: 1.0.0-RC1
 Author: John Gadbois
 Author URI: http://www.johngadbois.com
 Props to Nick Ohrn (http://plugin-developer.com/) for his plugin skeleton
 */

if(!class_exists('Comment_Review_Stars')) {
	class Comment_Review_Stars {
		/// CONSTANTS

		//// VERSION
		const VERSION = '1.0.0-RC1';

		//// KEYS

		//// SLUGS

		public static function init() {
			self::add_actions();
			self::add_filters();
			self::initialize_defaults();
			self::register_shortcodes();

			register_activation_hook(__FILE__, array(__CLASS__, 'do_activation_actions'));
			register_deactivation_hook(__FILE__, array(__CLASS__, 'do_deactivation_actions'));
		}

		private static function add_actions() {
			// Common actions
			add_action('init', array(__CLASS__, 'register_resources'), 0);
      add_action('init', array(__CLASS__, 'enqueue_resources'), 0);
      add_action( 'comment_post', array(__CLASS__, 'save_comment_rating'), 0);
      #add_filter('comments_template', array(__CLASS__, 'add_review_stars'), 0);

			if(is_admin()) {
				// Administrative only actions
			} else {
				// Frontend only actions
			}
		}

		private static function add_filters() {
			// Common filters

			if(is_admin()) {
				// Administrative only filters
        add_filter('comment_text', array(__CLASS__, 'add_rating_to_comment_text'), 0, 2);
        remove_filter('comment_text', 'wp_kses_post');
			} else {
				// Frontend only filters
			}
		}

		private static function initialize_defaults() {

		}

		private static function register_shortcodes() {

		}

		/// CALLBACKS

		public static function do_activation_actions() {

		}

		public static function do_deactivation_actions() {

		}

    /// ACTIONS
    public static function register_resources() {
			wp_register_script('jquery.rating', plugins_url('resources/frontend/jquery.rateit.min.js', __FILE__), array('jquery'), self::VERSION, true);
			wp_register_script('comment-review-stars', plugins_url('resources/frontend/comment-review-stars.js', __FILE__), array('jquery', 'jquery.rating'), self::VERSION, true);
			wp_register_style('jquery.rating', plugins_url('resources/frontend/rateit.css', __FILE__), array(), self::VERSION);
    }

    public static function enqueue_resources() {
			wp_enqueue_script('jquery.rating');
      wp_enqueue_script('comment-review-stars');
      wp_enqueue_style('jquery.rating');
    }

    public static function add_rating_to_comment_text($text, $comment) {
      if(csr_has_comment_rating()) {
        $text = self::get_rating_stars($comment->comment_ID) . "<br/>" . wp_kses_post($text) ;
      }

      return $text;
    }

    public static function save_comment_rating( $comment_id ) {
      if ( ( isset( $_POST['rating'] ) ) && ( $_POST['rating'] != '') )
      $rating = wp_filter_nohtml_kses($_POST['rating']);
      add_comment_meta( $comment_id, 'rating', $rating );
    }

    /// FILTERS
    public static function get_rating_star_form() {
      ob_start();

      ?>
        <div class='rateit' data-rateit-backingfld='.rating-field'></div>
        <input type='hidden' name='rating' class='rating-field'/>
      <?php
      
      $output = ob_get_contents();
      ob_end_clean();
      return $output;
    }

    public static function get_rating_stars($comment_id=0) {
      $rating = csr_get_comment_rating($comment_id);
      ob_start();
      ?>
        <div class='rateit'data-rateit-value="<?php echo $rating ?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
      <?php
      

      $output = ob_get_contents();
      ob_end_clean();
      return $output;
    }
    public static function get_overall_rating_stars() {
      $overall_rating = csr_get_overall_rating($comment_id);

      ob_start();
      ?>
        <div class='rateit'data-rateit-value="<?php echo $overall_rating ?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
      <?php

      $output = ob_get_contents();
      ob_end_clean();
      return $output;
    }

    public static function get_comment_rating( $comment_id=0 ) {
      $comment = get_comment( $comment_id);
      return get_comment_meta( $comment->comment_ID, 'rating', true );
    }

    public static function get_overall_rating($post_id = null) {
      global $post;

      if($post_id)
        $post = get_post($post_id);

      $comments = get_comments( array( 'post_id'=>$post->ID ) );
      $count = 0;
      $total = 0;

      foreach($comments as $comment) {
        if(csr_has_comment_rating($comment->comment_ID)) {
          $count++;
          $total += csr_get_comment_rating($comment->comment_ID);
        }
      }

      return $count > 0 ? $total/$count : null;
    }

    public static function get_rating_count() {
      global $post;

      if($post_id)
        $post = get_post($post_id);

      $comments = get_comments( array( 'post_id'=>$post->ID ) );
      $count = 0;

      foreach($comments as $comment) {
        if(csr_has_comment_rating($comment->comment_ID)) {
          $count++;
        }
      }

      return $count;
    }

    public static function get_rating_star_form_label() {
      ob_start();

      ?><label class='review-rating-label'>Rating</label><?php
      
      $output = ob_get_contents();
      ob_end_clean();
      return $output;

    }

		/// DISPLAY CALLBACKS
    public static function display_ratings() {
      ?><div class='rateit'></div><?php
    }

		/// SHORTCODE CALLBACKS

		/// POST META

		/// SETTINGS

		/// UTILITY

		private static function _redirect($url, $code = 302) {
			wp_redirect($url, $code); exit;
		}

		//// LINKS

		/// TEMPLATE TAGS

		public static function get_template_tag() {
			return '';
		}
	}

	require_once('lib/template-tags.php');
	Comment_Review_Stars::init();
}
