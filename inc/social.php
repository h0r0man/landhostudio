<?php

function social_description() {
  if (is_home() || is_page() || is_search()) {
    bloginfo('description');
  } else {
    while (have_posts()) {
      the_post();
      the_excerpt_rss();
    }
  }
}

function og_type() {
  if (is_home() || is_page() || is_search()) {
    echo "company";
  } else {
    echo "article";
  }
}

function og_url() {
  if (is_home()) {
    echo site_url();
  } else {
    echo get_permalink($post->ID);
  }
}

function og_image() {
  if (is_home() || is_page()) {
    echo site_url();
    the_field('options_image', 'option');
  } else {
    if (has_post_thumbnail()) {
      echo site_url();
      $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
      echo $url;
    } else {
      echo site_url();
      the_field('options_image', 'option');
    }
  }
}

function twitter_card() {
  if (is_home() || is_page() || is_search()) {
    echo "summary";
  } else {
    echo "summary_large_image";
  }
}
