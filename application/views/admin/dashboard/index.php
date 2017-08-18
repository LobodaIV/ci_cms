<h2>Recently Modified Articles</h2>
<?php if(count($recent_articles)): ?>
	<ul>
		<?php foreach ($recent_articles as $article):?>
			<li><?=anchor('admin/article/edit/' . $article->id, e($article->title))?> - <?=date('Y-m-d', strtotime($article->modified))?></li>
		<?php endforeach;?>
	</ul>
<?php endif;?>