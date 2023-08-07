<?php
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
//記事のPVを取得
//★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆★☆
function getPostViews($post_id) {
	$key = 'post_views_count';
	$count = get_post_meta($post_id, $key, true);
	if ($count=='') {
	  delete_post_meta($post_id, $key);
	  add_post_meta($post_id, $key, 0);
	  return 0;
	}
	return $count;
  }
  

// 記事のPVをカウントする
function setPostViews($post_id) {
	$key = 'post_views_count';
	$count = get_post_meta($post_id, $key, true);
	if ($count=='') {
	  $count = 0;
	  delete_post_meta($post_id, $key);
	  add_post_meta($post_id, $key, 0);
	} else {
	  $count++;
	  update_post_meta($post_id, $key, $count);
	}
  }
