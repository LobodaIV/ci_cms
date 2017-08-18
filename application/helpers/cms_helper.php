<?php


function add_meta_title($str) {
	$CI = &get_instance();
	$CI->data['meta_title'] = e($str) . ' - ' . $CI->data['meta_title'];
}

function btn_edit($uri) {
	return anchor($uri,'<span class="glyphicon glyphicon-edit"></span> Edit');
}

function btn_delete($uri) {
	return anchor($uri,'<span class="glyphicon glyphicon-remove"></span>', 
		array('onclick' => "return confirm('Please confirm delete operation');"));
}

function e($str) {
	return htmlentities($str);
}

function article_link($article) {
 	return 'article/' . intval($article->id) . '/' . e($article->tag);
 }

// function article_links($articles) {
// 	$str = '<ul>';
// 	foreach ($articles as $article) {
// 		$url = article_link($article);
// 		$str .= '<li><a href="' . base_url() . $url . '">' . $article->title . '</a></li>';
// 	}
// 	$str .= '</ul>';

// 	return $str;
// }

function get_snippet($article, $numwords = 50) {
	$str = '';
	$url = 'article/' . intval($article->id) . '/' . e($article->tag);
	$str .= '<h2>' . anchor($url,e($article->title)) . '</h2>';
	$str .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
	$str .= '<p>' . e(limit_numwords(strip_tags($article->body),$numwords)) . '</p>';
	$str .= '<p>' . anchor($url,'Read more >', array('title' => e($article->title))) . '</p>';
	
	return $str;
}

function limit_numwords($str, $numwords) {
	$snippet = explode(' ',$str, $numwords+1);
	if (count($snippet) >= $numwords) {
		array_pop($snippet);
	}
	$snippet = implode(' ',$snippet);
	return $snippet;
}

/*
<ul class="nav navbar-nav">
	        <li><a href="#">Link</a></li>
	        <li><a href="#">Link</a></li>
	        <!-- Dropdown -->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown 
	          <span class="caret"></span>
	          </a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	          </ul>
	        </li>

</ul><!-- /.dropdown -->

*/

function get_menu($arr, $child = false) {

	$CI = &get_instance();

	$str = '';
	if (count($arr)) {
		$str .= $child == false ? '<ul class="nav navbar-nav">' . PHP_EOL : 
		'<ul class="dropdown-menu">' . PHP_EOL;

		foreach ($arr as $item) {
			
			$active_item = $CI->uri->segment(1) == $item['title'] ? true : false;
			if (isset($item['children']) && count($item['children'])) {

				$str .= $active_item ? '<li class="dropdown active">' : '<li class="dropdown">' ;
				$str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="' .site_url(e($item['tag'])). '">' . e($item['title']);
				$str .= '<b class="caret"></b></a>' . PHP_EOL;
				$str .= get_menu($item['children'], true);

			} 
			//if don't have any children
			else {
				$str .= $active_item ? '<li class="active">' : '<li>';
				$str .= '<a href="' .site_url($item['tag']). '">' . e($item['title']) . '</a>';
			}
			$str .= '</li>' . PHP_EOL;

		}

		$str .= '</ul>' . PHP_EOL;
	}

	return $str;
	
}

function dump($obj) {
	echo '<pre>';
	var_dump($obj);
	echo '</pre>';
}