<?php

function csr_get_rating_star_form() {
	return apply_filters('csr_get_rating_star_form', Comment_Review_Stars::get_rating_star_form());
}
function csr_the_rating_star_form() {
	echo apply_filters('csr_the_rating_star_form', csr_get_rating_star_form());
}

function csr_get_rating_star_form_label() {
	return apply_filters('csr_get_rating_star_form_label', Comment_Review_Stars::get_rating_star_form_label());
}
function csr_the_rating_star_form_label() {
	echo apply_filters('csr_the_rating_star_form_label', csr_get_rating_star_form_label());
}

function csr_get_rating_stars($comment_id = 0) {
	return apply_filters('csr_get_rating_stars', Comment_Review_Stars::get_rating_stars($comment_id));
}
function csr_the_rating_stars($comment_id = 0) {
	echo apply_filters('csr_the_rating_stars', csr_get_rating_stars($comment_id));
}

function csr_has_comment_rating($comment_id = 0) {
	return apply_filters('csr_has_comment_rating', !!(csr_get_comment_rating($comment_id))); 
}
function csr_get_comment_rating($comment_id = 0) {
	return apply_filters('csr_get_comment_rating', Comment_Review_Stars::get_comment_rating($comment_id));
}
function csr_the_comment_rating($comment_id = 0) {
	echo apply_filters('csr_the_comment_rating', csr_get_comment_rating($comment_id));
}

function csr_has_overall_rating($post_id = 0) {
	return apply_filters('csr_has_overall_rating', !!(csr_get_overall_rating($post_id))); 
}
function csr_get_overall_rating($post_id = 0) {
	return apply_filters('csr_get_overall_rating', Comment_Review_Stars::get_overall_rating($post_id));
}
function csr_the_overall_rating($post_id = 0) {
	echo apply_filters('csr_the_overall_rating', csr_get_overall_rating($post_id));
}

function csr_has_overall_rating_stars($post_id = 0) {
	return apply_filters('csr_has_overall_rating_stars', !!(csr_get_overall_rating_stars($post_id))); 
}
function csr_get_overall_rating_stars($post_id = 0) {
	return apply_filters('csr_get_overall_rating_stars', Comment_Review_Stars::get_overall_rating_stars($post_id));
}
function csr_the_overall_rating_stars($post_id = 0) {
	echo apply_filters('csr_the_overall_rating_stars', csr_get_overall_rating_stars($post_id));
}

function csr_has_rating_count($post_id = 0) {
	return apply_filters('csr_has_rating_count', !!(csr_get_rating_count($post_id))); 
}
function csr_get_rating_count($post_id = 0) {
	return apply_filters('csr_get_rating_count', Comment_Review_Stars::get_rating_count($post_id));
}
function csr_the_rating_count($post_id = 0) {
	echo apply_filters('csr_the_rating_count', csr_get_rating_count($post_id));
}
