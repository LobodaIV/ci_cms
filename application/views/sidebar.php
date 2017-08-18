<?=anchor($news_archive_link, '<span class="glyphicon glyphicon-chevron-right"></span> News Archive');?>
<ul>
	<?php foreach($recent_news as $article):?>
		<li>
			<?=anchor(article_link($article), "<h3>$article->title</h3><h2>$article->pubdate</h2>");?>
		</li>
	<?php endforeach; ?>
</ul>