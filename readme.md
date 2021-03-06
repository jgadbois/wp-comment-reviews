# Comment Rating Stars

Contributors: jgadbois
Donate link: http://www.johngadbois.com
Tags: comments, reviews
Requires at least: 3.6
Tested up to: 3.6
Stable tag: 1.0.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A simple plugin for adding review and rating functionality to WordPress comments.

## Description

A simple plugin for adding review and rating functionality to WordPress comments.

The plugin provides a series of template tags for adding review functionality to your comments

Here's a few of them:

1. csr_get_rating_star_form() - adds the review stars to the comment form.  Ratings are automatically saved
1. csr_get_rating_star_form_label() - a label for the review star field
1. csr_get_rating_stars($comment_id = 0) - a view only view of the rating stars for a comment 
1. csr_get_comment_rating($comment_id = 0) - the numeric rating for a comment
1. csr_get_overall_rating($post_id = 0) - the average rating for a post
1. csr_get_overall_rating_stars($post_id = 0) - the stars representing the average rating for a post
1. csr_get_rating_count($post_id = 0) - the number of ratings for a post

## Installation

1. Upload the plugin zip file to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

## Screenshots

1. An example review form
2. An example review
3. An example total ratings section

## Changelog

### 1.0

* Initial release
